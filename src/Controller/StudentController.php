<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
/**
 * @Route("/student")
 */
class StudentController extends AbstractController
{
    /**
     * @return Response
     * @Route("/pdf",name="pdf", methods={"GET"})
     */
    public function pdf(StudentRepository $repform ):Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();

        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('student/pdf.html.twig', [
            $students =$repform->findAll(),
            'students' => $students
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A1', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("students.pdf", [
            "Attachment" => true
        ]);
        return new Response('', 200, [
            'Content-Type' => 'application/pdf',
        ]);

    }

    /**
     * @return Response
     * @Route("/pdf/{id}",name="pdfShow", methods={"GET"})
     */
    public function pdfShow(Student $student):Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();

        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('student/pdfShow.html.twig', [
            'student' => $student
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("student.pdf", [
            "Attachment" => true
        ]);
        return new Response('', 200, [
            'Content-Type' => 'application/pdf',
        ]);

    }

    /**
     * @Route("/", name="student_index", methods={"GET"})
     */
    public function index(Request $request,StudentRepository $studentRepository): Response
    {
        $triString=$request->get('triBy');
        $searchString=$request->get('search');
        if($triString != null) {
            $students = $studentRepository->findBy([],[$triString => 'ASC']);
        }
        elseif ($searchString != null)
        $students = $studentRepository->findByUsername($searchString);
        else
            $students = $studentRepository->findAll();
        return $this->render('student/index.html.twig', [
            'students' => $students,
        ]);
    }

    /**
     * @Route("/stat", name="student_stat", methods={"GET","POST"})
     */
    public function Stat(StudentRepository $studentRepository): Response
    {
        $x = json_encode($studentRepository->getUsernames());
        $x = str_replace('},{"username" ":',',',$x);
        $x = str_replace('{"username":','',$x);
        $labels = str_replace('}','',$x);

        $y = json_encode($studentRepository->getIds());
        $y = str_replace('},{"id":',',',$y);
        $y = str_replace('{"id":','',$y);
        $datas = str_replace('}','',$y);
        //$datas = $studentRepository->getIds();
        return $this->render('student/stat.html.twig', [
            'labels' => $labels,'datas' => $datas,
        ]);
    }

    /**
     * @Route("/new", name="student_new", methods={"GET","POST"})
     */
    public function new(Request $request,UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPass = $encoder->encodePassword($student,$student->getPassword());
            $student->setPassword($hashedPass);
            $student->setDateAdd(new Datetime("now"));
            $imageFile = $form->get('profilePic')->getData();
            if($imageFile ) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '.jpg';
                $student->setProfilePic($newFilename);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($student);
            $entityManager->flush();
            $this->SendEmail($mailer);

            return $this->redirectToRoute('student_index');
        }

        return $this->render('student/new.html.twig', [
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    public function SendEmail( \Swift_Mailer $mailer){
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('teachmepidev@gmail.com')
            ->setTo('teachmepidev@gmail.com')
            ->setSubject('Welcome to Teach me')
            ->setBody(
                $this->renderView(
                    'student/MailSuccessSignUp.html.twig'));
        $mailer->send($message);
    }

    /**
     * @Route("/{id}", name="student_show", methods={"GET"})
     */
    public function show(Student $student): Response
    {
        return $this->render('student/show.html.twig', [
            'student' => $student,
        ]);
    }



    /**
     * @Route("/{id}/edit", name="student_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Student $student,UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPass = $encoder->encodePassword($student,$student->getPassword());
            $student->setPassword($hashedPass);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('student_index');
        }

        return $this->render('student/edit.html.twig', [
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_delete", methods={"POST"})
     */
    public function delete(Request $request, Student $student): Response
    {
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($student);
            $entityManager->flush();
        }

        return $this->redirectToRoute('student_index');
    }




}

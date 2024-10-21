-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 05:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeline_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `dr_id` int(10) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `dr_description` text NOT NULL,
  `dr_img` text NOT NULL,
  `dr_specialities` int(10) NOT NULL,
  `created_details` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`dr_id`, `dr_name`, `dr_description`, `dr_img`, `dr_specialities`, `created_details`) VALUES
(1, 'Dr.Mallikandara', 'A cardiologist,consultant cardiology surgen,distric general hospital Colombo.', 'doctor.png', 1, '2024-04-21 14:27:29'),
(2, 'Dr.Senewirathne', 'A cardiologist,consultant cardiology surgen,distric general hospital Nawalapitiya.', 'doctor.png', 1, '2024-04-21 14:27:40'),
(3, 'Dr.Hemachandra', 'A Neurologist,consultant neurology surgen,distric general hospital Nawalapitiya', 'doctor.png', 8, '2024-04-21 15:11:28'),
(4, 'Dr.Kamaldhasa', 'A Neurologist,consultant neurology surgen,distric general hospital Kuliyapitiya', 'doctor.png', 2, '2024-04-21 14:27:54'),
(5, 'Dr.Mallikandara', 'A orthopedic,consultant orthopedic surgen,distric general hospital Colombo', 'doctor.png', 3, '2024-04-21 14:27:59'),
(6, 'Dr.Lernal', 'A cardiologist,consultant cardiology surgen,distric general hospital Colombo.', 'doctor.png', 3, '2024-04-21 15:10:52'),
(7, 'Dr.Senewirana', 'A cardiologist,consultant cardiology surgen,distric general hospital Nawalapitiya.', 'doctor.png', 4, '2024-04-21 15:10:59'),
(8, 'Dr.Hemmachnadana', 'A Neurologist,consultant neurology surgen,distric general hospital Nawalapitiya', 'doctor.png', 4, '2024-04-21 15:11:04'),
(9, 'Dr.Kamaldhasa Kumara', 'A Neurologist,consultant neurology surgen,distric general hospital Kuliyapitiya', 'doctor.png', 5, '2024-04-21 15:11:11'),
(10, 'Dr.Mallik Kannoruwa', 'A orthopedic,consultant orthopedic surgen,distric general hospital Colombo', 'doctor.png', 6, '2024-04-21 15:11:20'),
(11, 'Dr.Kumukumbara', 'A cardiologist,consultant cardiology surgen,distric general hospital Colombo.', 'doctor.png', 7, '2024-04-21 15:11:24'),
(12, 'Dr.Lakshani', 'A cardiologist,consultant cardiology surgen,distric general hospital Nawalapitiya.', 'doctor.png', 5, '2024-04-21 15:11:39'),
(13, 'Dr.Weerathuinga', 'A Neurologist,consultant neurology surgen,distric general hospital Nawalapitiya', 'doctor.png', 6, '2024-04-21 15:11:45'),
(14, 'Dr.Kasununa', 'A Neurologist,consultant neurology surgen,distric general hospital Kuliyapitiya', 'doctor.png', 7, '2024-04-21 15:11:52'),
(15, 'Dr.Nuwan', 'A orthopedic,consultant orthopedic surgen,distric general hospital Colombo', 'doctor.png', 8, '2024-04-21 15:11:58'),
(16, 'Dr.Ronal', 'A cardiologist,consultant cardiology surgen,distric general hospital Colombo.', 'doctor.png', 1, '2024-04-21 14:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `medical_specialties`
--

CREATE TABLE `medical_specialties` (
  `sp_id` int(10) NOT NULL,
  `sp_title` varchar(100) NOT NULL,
  `sp_description` text NOT NULL,
  `sp_icon` text NOT NULL,
  `doc_doctorid` int(10) DEFAULT NULL,
  `created_details` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_specialties`
--

INSERT INTO `medical_specialties` (`sp_id`, `sp_title`, `sp_description`, `sp_icon`, `doc_doctorid`, `created_details`) VALUES
(1, 'Cardiology', 'Your premier destination for comprehensive heart health care. When concerns arise about your heart, fretting is the last thing you need. That\'s why we\'ve designed our facilities to be stress-free environments dedicated to addressing all aspects of your cardiac well-being in one convenient location.Our team of specialized cardiologists, cardiac surgeons, and cardiac anesthesiologists are committed to meeting your every cardiac need. From accurate diagnosis and personalized advice to advanced medical interventions and top-notch pre- and post-operative care, we\'re here to offer you the peace of mind you deserve. Throughout your journey with us, our experts will ensure you\'re well-informed and empowered to make the best decisions for your health.\n\nLed by seasoned professionals with extensive experience in cardiology, our state-of-the-art facilities are equipped with cutting-edge technology to effectively manage any cardiac condition. Our mission is to guide you toward a complete, healthier, and happier lifestyle.', 'heart-rate.png', NULL, '2024-04-21 12:53:52'),
(2, 'Neurology', 'Neurology, as a medical system, focuses on the diagnosis and treatment of disorders related to the nervous system. This intricate network includes the brain, spinal cord, nerves, and muscles, all of which play critical roles in controlling various bodily functions and behaviors.\r\n\r\nNeurologists, specialists trained in neurology, deal with a wide range of conditions, from common issues like headaches and sleep disorders to more complex diseases such as epilepsy, multiple sclerosis, and Alzheimers disease. Their expertise involves understanding the intricate workings of the nervous system, utilizing various diagnostic techniques like imaging studies and neurological examinations, and devising treatment plans which may involve medications, rehabilitation therapies, or surgical interventions to manage or alleviate neurological conditions.\r\n\r\nThe field of neurology continuously evolves with advancements in medical technology and research, aiming to improve the understanding and management of neurological disorders for better patient outcomes.', 'brain.png', 0, '2024-04-21 12:52:36'),
(3, 'Orthopedics', 'Welcome to our Orthopedic Medical Service, where we prioritize your mobility, comfort, and overall musculoskeletal health. As leaders in orthopedic care, we understand the profound impact that bone, joint, and muscle health have on your daily life. Whether you\'re an athlete striving for peak performance, someone recovering from an injury, or an individual seeking relief from chronic musculoskeletal conditions, we\'re here to guide you on your journey to better health and enhanced mobility.\r\n\r\nAt our orthopedic medical service, we offer a comprehensive range of specialized treatments, personalized to meet your unique needs. Our team of experienced orthopedic surgeons, physicians, physical therapists, and support staff work collaboratively to deliver the highest quality care, utilizing the latest advancements in orthopedic medicine and technology.\r\n\r\nFrom diagnosis to treatment and rehabilitation, we prioritize patient-centered care, ensuring that you are informed, empowered, and supported every step of the way. Whether you require surgical intervention, non-invasive therapies, or preventive measures, we tailor our approach to optimize your outcomes and improve your quality of life.', 'orthopedics.png', NULL, '2024-04-21 15:01:48'),
(4, 'Dental', 'Dental medical services encompass a broad range of healthcare focused on the diagnosis, prevention, and treatment of conditions related to the teeth, gums, mouth, and overall oral health. These services are provided by trained professionals called dentists, who may specialize in various areas such as general dentistry, orthodontics, endodontics, periodontics, prosthodontics, and oral surgery.\r\n\r\nDental medical services typically include routine check-ups and cleanings, restorative procedures like fillings and crowns, cosmetic treatments such as teeth whitening and veneers, as well as specialized care for issues like gum disease, tooth misalignment, and oral surgery.\r\n\r\nOverall, dental medical services play a crucial role in maintaining oral health, preventing dental diseases, and restoring function and aesthetics to the mouth, thus contributing to the overall well-being of individuals.', 'dental-checkup.png', NULL, '2024-04-21 15:01:48'),
(5, 'Gynecology', 'It encompasses a wide range of medical services aimed at diagnosing, treating, and preventing conditions related to the female reproductive organs, including the uterus, ovaries, fallopian tubes, and breasts. Gynecologists are medical doctors who specialize in providing care for women\'s reproductive health throughout their lives, from adolescence through menopause and beyond.\r\n\r\nGynecological medical services include routine examinations such as pelvic exams and Pap smears to screen for cervical cancer and other abnormalities, as well as the diagnosis and treatment of various conditions such as menstrual disorders, pelvic pain, infertility, sexually transmitted infections (STIs), and menopausal symptoms. Gynecologists also provide contraceptive counseling, prenatal care, and management of complications related to pregnancy and childbirth.\r\n\r\nOverall, gynecological medical services play a crucial role in promoting and maintaining the reproductive health and well-being of women, addressing their unique healthcare needs at different stages of life.', 'pregnancy.png', NULL, '2024-04-21 15:06:19'),
(6, 'Gastroenterology', 'Gastroenterology is the medical specialty focused on the digestive system and its disorders. It encompasses the study, diagnosis, and treatment of conditions affecting the gastrointestinal (GI) tract, which includes the esophagus, stomach, small intestine, large intestine (colon), rectum, liver, gallbladder, and pancreas.\r\n\r\nGastroenterologists are physicians who specialize in this field, managing a wide range of conditions such as gastroesophageal reflux disease , peptic ulcers, inflammatory bowel diseases (such as Crohn\'s disease and ulcerative colitis), irritable bowel syndrome (IBS), gastrointestinal bleeding, liver diseases (such as hepatitis and cirrhosis), pancreatic disorders, and cancers of the digestive system.\r\n\r\nGastroenterology involves various diagnostic procedures such as endoscopy, colonoscopy, and imaging studies to evaluate and diagnose conditions of the GI tract. Treatment options may include medications, lifestyle modifications, dietary changes, minimally invasive procedures, and, in some cases, surgery.', 'gastroenterology.png', NULL, '2024-04-21 15:06:19'),
(7, 'Oncology', 'The field of oncology encompasses various aspects of cancer care, including prevention, screening, diagnosis, staging, treatment, and palliative care. Oncologists work closely with multidisciplinary teams of healthcare professionals, including surgeons, radiologists, pathologists, nurses, and other specialists, to provide comprehensive and personalized care to cancer patients.\r\n\r\nTreatment approaches in oncology can vary widely depending on the type and stage of cancer, as well as individual patient factors. Common treatment modalities include surgery, chemotherapy, radiation therapy, immunotherapy, hormone therapy, targeted therapy, and stem cell transplantation.\r\n\r\nOncology is a rapidly evolving field, with ongoing research leading to advances in understanding cancer biology, developing new treatment options, and improving outcomes for cancer patients. The ultimate goal of oncology is to prevent cancer when possible, cure it when feasible, and improve the quality of life for individuals living with cancer.', 'tumor.png', NULL, '2024-04-21 15:06:19'),
(8, 'Mental Health', 'The medical mental health system encompasses the network of professionals, facilities, and resources dedicated to diagnosing, treating, and supporting individuals with mental health conditions.\r\n\r\nIt\'s a multidisciplinary field that draws on psychiatry, psychology, social work, counseling, nursing, and other allied health professions to provide comprehensive care.\r\n\r\nAt its core, the medical mental health system aims to promote mental well-being and address the diverse range of mental health challenges people face, from mood disorders like depression and anxiety to more severe conditions such as schizophrenia and bipolar disorder.', 'mental-care.png', NULL, '2024-04-21 15:06:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `medical_specialties`
--
ALTER TABLE `medical_specialties`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `dr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medical_specialties`
--
ALTER TABLE `medical_specialties`
  MODIFY `sp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

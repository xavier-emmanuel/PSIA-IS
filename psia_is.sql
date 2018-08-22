-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2018 at 01:55 AM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6854270_patton`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL,
  `v_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_vacancy_id` int(11) NOT NULL,
  `approved` int(11) NOT NULL,
  `hired` int(11) NOT NULL,
  `interview_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_interview` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_hired` timestamp NULL DEFAULT NULL,
  `date_approved` timestamp NULL DEFAULT NULL,
  `interviewed` int(11) DEFAULT NULL,
  `score` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile`, `age`, `gender`, `civil_status`, `address`, `place_of_birth`, `date_of_birth`, `username`, `password`, `remember_token`, `role`, `image`, `verified`, `v_code`, `job_vacancy_id`, `approved`, `hired`, `interview_title`, `interview_message`, `date_of_interview`, `date_hired`, `date_approved`, `interviewed`, `score`, `created_at`, `updated_at`) VALUES
(1, 'Charles', 'Abrab', 'Opmil', 'charlesmarnielimpo@gmail.com', '+639367995285', '23', 'Male', 'Single', '#23 Brgy. 100 Inevitable Place, P-3 Example Address, Legazpi City', '#23 Brgy. 100 Inevitable Place, P-3 Example Address, Legazpi City', '06/21/1995', 'charles', '$2y$10$xvKvGWMpyELSXv1BtQdrU.okMMyQBhEkqHvK64.EaVr2pxdBWNXee', '6IUJZv7zuos5Zi7mHMMFPmF8Z25ejz7mKu6PpwKLb5wKuDTUxQONVweQqpZo', 'Applicant', '1534740089Afaeric Concept.jpg', 1, '523928', 1, 1, 1, 'Job Interview', 'Good Day!\r\n\r\nThank you for applying to the Software Developer Position. Your job interview will be on', '08/22/2018 10:00 PM', '2018-08-20 06:48:39', '2018-08-20 06:38:18', 1, 'Passed', '2018-08-05 18:57:48', '2018-08-20 06:48:39'),
(2, 'Xavier', 'Adallat', 'Acitober', 'seybyer.emanwel@gmail.com', '+639770283149', '21', 'Male', 'Single', '#23 Example Address, Legazpi City', '#23 Example Address, Legazpi City', '03/11/1997', 'xavier', '$2y$10$IYBi8GUKT0awvjY0/BkLiu.GvbA.fXnjYRW8Hi5YPEhsmAtE8.GmC', 's9FAgR7i9Z25bkPUM0N4dGrYRucCpgprEEnOCqJkAUMp0TaHsqcufKMFstKL', 'Human Resource', '1534740221Ebonddrake Ritualist.jpg', 1, '708135', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-07 05:38:56', '2018-08-20 04:45:47'),
(3, 'Jordan', 'Sagelliv', 'Zepol', 'moy27.pogi@gmail.com', '+639108108189', '21', 'Male', 'Single', '#23 Example Address, Legazpi City', '#23 Example Address, Legazpi City', '06/21/1997', 'jordan', '$2y$10$9OqlpbfO1DaYcB2ibwS.peGXalDKlQYLP8lKjyNoBXTCK1e.t7biO', 'vTinrYdmt6KQ8O4lLYUi61P9LJZ1TGolbQtxf1NTYElw2Z9hKnOkAqEzL0jF', 'General Manager', '1534740395Valentin.jpg', 1, '368046', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-07 05:40:54', '2018-08-20 04:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `educational_backgrounds`
--

CREATE TABLE `educational_backgrounds` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `elementary_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elementary_award` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elementary_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elementary_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highschool_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highschool_award` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highschool_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highschool_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_award` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_backgrounds`
--

INSERT INTO `educational_backgrounds` (`id`, `account_id`, `elementary_school`, `elementary_award`, `elementary_year`, `elementary_address`, `highschool_school`, `highschool_award`, `highschool_year`, `highschool_address`, `college_school`, `college_award`, `college_year`, `college_address`, `created_at`, `updated_at`) VALUES
(2, 1, 'Albay Central School', 'Best in Noisy', '2008', 'Brgy. 16 Washington Drive East, Legazpi City', 'Daraga National High School', 'Best in Late', '2012', 'Daraga, Albay', 'SLTCFI', 'Best in Pogi', '2018', 'Legazpi City', '2018-08-20 06:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment_records`
--

CREATE TABLE `employment_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `company_name_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_emlployment_from_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_emlployment_to_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_position_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superior_name_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nature_of_job_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_salary_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_upon_leaving_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_of_leaving_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_emlployment_from_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_emlployment_to_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_position_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superior_name_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nature_of_job_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_salary_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_upon_leaving_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_of_leaving_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_emlployment_from_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_emlployment_to_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_position_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superior_name_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nature_of_job_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_salary_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_upon_leaving_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_of_leaving_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_records`
--

INSERT INTO `employment_records` (`id`, `account_id`, `company_name_1`, `period_of_emlployment_from_1`, `period_of_emlployment_to_1`, `company_address_1`, `work_position_1`, `superior_name_1`, `nature_of_job_1`, `starting_salary_1`, `salary_upon_leaving_1`, `reason_of_leaving_1`, `company_name_2`, `period_of_emlployment_from_2`, `period_of_emlployment_to_2`, `company_address_2`, `work_position_2`, `superior_name_2`, `nature_of_job_2`, `starting_salary_2`, `salary_upon_leaving_2`, `reason_of_leaving_2`, `company_name_3`, `period_of_emlployment_from_3`, `period_of_emlployment_to_3`, `company_address_3`, `work_position_3`, `superior_name_3`, `nature_of_job_3`, `starting_salary_3`, `salary_upon_leaving_3`, `reason_of_leaving_3`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `government_exams`
--

CREATE TABLE `government_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `examination_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_date_taken_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_result_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_place_taken_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_date_taken_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_result_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_place_taken_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_date_taken_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_result_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_place_taken_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `government_exams`
--

INSERT INTO `government_exams` (`id`, `account_id`, `examination_1`, `examination_date_taken_1`, `examination_result_1`, `examination_place_taken_1`, `examination_2`, `examination_date_taken_2`, `examination_result_2`, `examination_place_taken_2`, `examination_3`, `examination_date_taken_3`, `examination_result_3`, `examination_place_taken_3`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancies`
--

CREATE TABLE `job_vacancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_vacancy` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hiring_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_vacancies`
--

INSERT INTO `job_vacancies` (`id`, `name`, `no_of_vacancy`, `image`, `description`, `hiring_status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'Software Developer', 1, '1534740733services.jpeg', '<p>We are looking for an experienced and talented developer to join our team to work on our new web-based products. The developer will work in a SCRUM team to design, develop, test and deploy web applications on the cloud or on-premise environments.<br />\r\n<br />\r\nSkills Desired<br />\r\n- ASP.NET MVC, C#, Web Services, WCF, MSMQ<br />\r\n- HTML, CSS, Javascript, Jquery<br />\r\n- Participate frequently in conference calls via Google Hangout or GotoMeeting sessions<br />\r\n- Work with remote teams in Singapore and Malaysia<br />\r\n- Participate in SCRUM methodology<br />\r\n- Able to work independently to research appropriate solutions<br />\r\n- Experience in scheduling algorithms is preferred<br />\r\n- Be available from 9am +GMT 8</p>', '0', '1', '2018-08-20 04:52:13', '2018-08-20 06:48:39'),
(2, 'Virtual Assistant', 2, '1534740849pexels-photo-1018484.jpeg', '<p>Only native German speakers will be considered for this job!<br />\r\n<br />\r\nWe are a fast-growing IT Recruiting company for IT professionals from India, which has been established on the German market for 20 years (we only offer candidates from India).<br />\r\n<br />\r\nWe help our customers<br />\r\n1. to overcome the skills shortage<br />\r\n2. Halve the personnel costs<br />\r\n3. in the transformation to an agile company<br />\r\n<br />\r\nTo strengthen our recruitment team, we are looking for an assistant.<br />\r\n<br />\r\n----- Deutsche Stellenausschreibung -----<br />\r\n<br />\r\nWir sind ein stark wachsender Personaldienstleister f&uuml;r IT-Fachkr&auml;fte aus Indien das seit 20 Jahren auf dem deutschen Markt etabliert ist (Wir bieten ausschlie&szlig;lich Kandidaten aus Indien an.)<br />\r\n<br />\r\nWir helfen unseren Kunden<br />\r\n1. den Fachkr&auml;ftemangel zu &uuml;berwinden<br />\r\n2. die Personalkosten zu halbieren<br />\r\n3. bei der Transformation zu einem agilen Unternehmen<br />\r\n<br />\r\nZur Verst&auml;rkung unseres Recruitment Teams suchen wir einen Assistenten (m/w).<br />\r\n<br />\r\nIhre Aufgaben<br />\r\n- Unterst&uuml;tzung der Berater im Rekrutierungs- und Auswahlverfahren&nbsp;<br />\r\n- Verarbeitung der eingehenden CVs<br />\r\n- Unterst&uuml;tzung der Kunden bei der Auswahl und Interviews der Kandidaten<br />\r\n- Laufende Betretung und Koordination zwischen Kunden und Kandidaten<br />\r\n<br />\r\nIhr Profil<br />\r\n- Absolute Zuverl&auml;ssigkeit<br />\r\n- Kommunikationsstark auf Deutsch und Englisch<br />\r\n- Hohes Engagement und Eigenverantwortung&nbsp;<br />\r\n<br />\r\nWas wir Ihnen bieten<br />\r\nNeben der Herausforderung, stetig wachsende Anforderungen in einem dynamischen und internationalen Markt umzusetzen, bieten wir Ihnen eine spannende, eigenverantwortliche und konstruktive Mitarbeit in einem internationalen Team.&nbsp;<br />\r\n<br />\r\nWenn wir Ihr Interesse geweckt haben sollten, freuen wir uns auf Ihre aussagekr&auml;ftige Bewerbung.</p>', '1', '0', '2018-08-20 04:54:09', '2018-08-20 04:55:10'),
(3, 'Amazon VA', 2, '1534741002Nami_2.jpg', '<p>Looking for a VA has prior experience intepret Keepa sales rank graph in book category, experience on amazon EU is a plus. Must be willing to work under hubstaff monitoring software. Thank you.</p>', '0', '0', '2018-08-20 04:56:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `organization_name_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_date_from_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_date_to_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_position_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_date_from_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_date_to_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_position_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_date_from_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_date_to_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_position_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `account_id`, `organization_name_1`, `organization_date_from_1`, `organization_date_to_1`, `organization_position_1`, `organization_name_2`, `organization_date_from_2`, `organization_date_to_2`, `organization_position_2`, `organization_name_3`, `organization_date_from_3`, `organization_date_to_3`, `organization_position_3`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-20 06:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_infos`
--

CREATE TABLE `personal_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `provincial_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `sss_number` int(11) DEFAULT NULL,
  `tin_number` int(11) DEFAULT NULL,
  `philhealth_number` int(11) DEFAULT NULL,
  `license_number` int(11) DEFAULT NULL,
  `date_issued` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siblings_name_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_birth_date_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_occupation_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_name_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_birth_date_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_occupation_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_name_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_birth_date_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings_occupation_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_birth_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_dependent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_name_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_birth_date_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_occupation_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_name_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_birth_date_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_occupation_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_name_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_birth_date_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_occupation_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_infos`
--

INSERT INTO `personal_infos` (`id`, `account_id`, `provincial_address`, `phone_number`, `place_of_birth`, `religion`, `height`, `weight`, `sss_number`, `tin_number`, `philhealth_number`, `license_number`, `date_issued`, `expiration_date`, `father_name`, `father_birth_date`, `father_occupation`, `mother_name`, `mother_birth_date`, `mother_occupation`, `siblings_name_1`, `siblings_birth_date_1`, `siblings_occupation_1`, `siblings_name_2`, `siblings_birth_date_2`, `siblings_occupation_2`, `siblings_name_3`, `siblings_birth_date_3`, `siblings_occupation_3`, `spouse_name`, `spouse_birth_date`, `spouse_occupation`, `spouse_dependent`, `child_name_1`, `child_birth_date_1`, `child_occupation_1`, `child_name_2`, `child_birth_date_2`, `child_occupation_2`, `child_name_3`, `child_birth_date_3`, `child_occupation_3`, `contact_name`, `contact_relation`, `contact_number`, `contact_address`, `created_at`, `updated_at`) VALUES
(2, 1, '#23 Brgy. 100 Inevitable Place, P-3 Example Address, Legazpi City', '+639367995285', '#23 Brgy. 100 Inevitable Place, P-3 Example Address, Legazpi City', 'Roman Catholic', 172, 55, NULL, NULL, NULL, NULL, NULL, NULL, 'Nosram A.  Opmil', '01/08/1974', 'Unemployed', 'Norashsled B. Opmil', '11/17/1973', 'Housewife', 'Nosram B. Opmil', '07/10/1992', 'Freelancer', 'Euqinom Ahsram B. Opmil', '12/05/1993', 'Housewife', 'Noiram Kram B. Opmil', '02/18/1997', 'Student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nosram A.  Opmil', 'Father', '+639367995285', '#23 Brgy. 100 Inevitable Place, P-3 Example Address, Legazpi City', '2018-08-20 06:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_preferences`
--

CREATE TABLE `personal_preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `preference_name_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_occupation_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_contact_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_name_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_occupation_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_contact_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_name_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_occupation_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preference_contact_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_preferences`
--

INSERT INTO `personal_preferences` (`id`, `account_id`, `preference_name_1`, `preference_occupation_1`, `preference_contact_1`, `preference_name_2`, `preference_occupation_2`, `preference_contact_2`, `preference_name_3`, `preference_occupation_3`, `preference_contact_3`, `created_at`, `updated_at`) VALUES
(2, 1, 'Julius Galvez', 'Janitor', '+639367995285', 'Malvar Herrera Jr.', 'Software Engineer', '+639367995285', 'EJ Fajardo', 'Web Developer', '+639367995285', '2018-08-20 06:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `dialect` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `convicted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `convicted_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_problems` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_problems_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accident` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommend_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relative_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsidiary_office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsidiary_office_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincial_assignments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preffered_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills_select` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `self_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_of_applying` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_goals` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `accomplishments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `account_id`, `dialect`, `convicted`, `convicted_details`, `health_problems`, `health_problems_details`, `accident`, `accident_details`, `recommend_name`, `relative`, `relative_name`, `subsidiary_office`, `subsidiary_office_reason`, `provincial_assignments`, `preffered_office`, `skills`, `skills_select`, `self_description`, `reason_of_applying`, `career_goals`, `accomplishments`, `created_at`, `updated_at`) VALUES
(2, 1, 'English,Tagalog,Bicol', '0', NULL, '0', NULL, '0', NULL, NULL, '0', NULL, '1', NULL, '0', NULL, 'Data Encoder,Programming', 'Computer Operations,Computer Repair,Typing,Programming,Others', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac euismod libero, vel scelerisque tellus. Ut vel orci sed sem suscipit porta. Sed pharetra diam id enim tristique, a pharetra felis ullamcorper. Donec iaculis ultrices ante, at maximus ante mattis quis. Aenean ac tempus magna. Etiam dignissim ac urna at ornare. Integer nec metus at nibh aliquam maximus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac euismod libero, vel scelerisque tellus. Ut vel orci sed sem suscipit porta. Sed pharetra diam id enim tristique, a pharetra felis ullamcorper. Donec iaculis ultrices ante, at maximus ante mattis quis. Aenean ac tempus magna. Etiam dignissim ac urna at ornare. Integer nec metus at nibh aliquam maximus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac euismod libero, vel scelerisque tellus. Ut vel orci sed sem suscipit porta. Sed pharetra diam id enim tristique, a pharetra felis ullamcorper. Donec iaculis ultrices ante, at maximus ante mattis quis. Aenean ac tempus magna. Etiam dignissim ac urna at ornare. Integer nec metus at nibh aliquam maximus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac euismod libero, vel scelerisque tellus. Ut vel orci sed sem suscipit porta. Sed pharetra diam id enim tristique, a pharetra felis ullamcorper. Donec iaculis ultrices ante, at maximus ante mattis quis. Aenean ac tempus magna. Etiam dignissim ac urna at ornare. Integer nec metus at nibh aliquam maximus.', '2018-08-20 06:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`),
  ADD UNIQUE KEY `accounts_username_unique` (`username`);

--
-- Indexes for table `educational_backgrounds`
--
ALTER TABLE `educational_backgrounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educational_backgrounds_account_id_foreign` (`account_id`);

--
-- Indexes for table `employment_records`
--
ALTER TABLE `employment_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employment_records_account_id_foreign` (`account_id`);

--
-- Indexes for table `government_exams`
--
ALTER TABLE `government_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `government_exams_account_id_foreign` (`account_id`);

--
-- Indexes for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizations_account_id_foreign` (`account_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_infos_account_id_foreign` (`account_id`);

--
-- Indexes for table `personal_preferences`
--
ALTER TABLE `personal_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_preferences_account_id_foreign` (`account_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_account_id_foreign` (`account_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educational_backgrounds`
--
ALTER TABLE `educational_backgrounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employment_records`
--
ALTER TABLE `employment_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `government_exams`
--
ALTER TABLE `government_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_infos`
--
ALTER TABLE `personal_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_preferences`
--
ALTER TABLE `personal_preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

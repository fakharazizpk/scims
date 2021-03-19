-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 11:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scims_db`
--
CREATE DATABASE IF NOT EXISTS `scims_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `scims_db`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_qualification`
--

DROP TABLE IF EXISTS `academic_qualification`;
CREATE TABLE `academic_qualification` (
  `acdm_qual_Id` bigint(10) NOT NULL COMMENT 'Academic Qualification''s ID',
  `acdm_qual_Name` varchar(100) NOT NULL COMMENT 'Academic Qualification''s Name',
  `univ_Id` bigint(10) NOT NULL COMMENT 'Qualification''s University',
  `sub_Id` int(10) NOT NULL COMMENT 'Subject of Academic Qualification',
  `acdm_comp_Session` year(4) NOT NULL COMMENT 'Passing Year of degree',
  `grade_Id` int(10) DEFAULT NULL COMMENT 'Grade of qualification',
  `acdm_Gpa` double(10,2) DEFAULT NULL COMMENT 'GPA of Applicant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_qualification`
--

INSERT INTO `academic_qualification` (`acdm_qual_Id`, `acdm_qual_Name`, `univ_Id`, `sub_Id`, `acdm_comp_Session`, `grade_Id`, `acdm_Gpa`) VALUES
(1, 'Fs\'c', 1, 1, 2001, 1, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE `admission` (
  `adm_No` bigint(100) NOT NULL COMMENT 'Admission number of student',
  `adm_Date` date NOT NULL COMMENT 'Date of student admission',
  `adm_Session` year(4) NOT NULL COMMENT 'Year of admission session'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_type`
--

DROP TABLE IF EXISTS `attendance_type`;
CREATE TABLE `attendance_type` (
  `att_typ_Id` int(10) NOT NULL COMMENT 'Attendance type''s ID',
  `att_typ_Name` varchar(20) NOT NULL COMMENT 'Attendance type''s name',
  `att_typ_Status` enum('Active','Inactive') NOT NULL COMMENT 'Status of attendance type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `auth_Id` bigint(10) NOT NULL COMMENT 'Author ID',
  `auth_Name` varchar(100) NOT NULL COMMENT 'Author Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

DROP TABLE IF EXISTS `blood_group`;
CREATE TABLE `blood_group` (
  `bg_Id` int(10) NOT NULL COMMENT 'Blood Group ID',
  `blood_group` varchar(20) NOT NULL COMMENT 'Name of the blood group'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`bg_Id`, `blood_group`) VALUES
(3, 'A+'),
(4, 'Ab+'),
(5, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

DROP TABLE IF EXISTS `boards`;
CREATE TABLE `boards` (
  `pk_board_Id` int(10) NOT NULL COMMENT 'Board ID',
  `board_Name` varchar(255) DEFAULT NULL COMMENT 'Board Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`pk_board_Id`, `board_Name`) VALUES
(1, 'BISE, Kohat'),
(2, 'BISE, Rawalpindi'),
(4, 'FBISE, Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

DROP TABLE IF EXISTS `cast`;
CREATE TABLE `cast` (
  `cast_Id` int(10) NOT NULL COMMENT 'Cast ID',
  `cast` varchar(50) NOT NULL COMMENT 'Cast name of someone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`cast_Id`, `cast`) VALUES
(1, 'Khattak');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `pk_city_id` int(11) NOT NULL,
  `dom_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `zip_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`pk_city_id`, `dom_id`, `city_name`, `zip_code`) VALUES
(1, 1, 'Bannu', '27200'),
(2, 4, 'Rawalpindi', '46000'),
(3, 2, 'Karak', '27200');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `cls_Id` int(10) NOT NULL COMMENT 'Class Id',
  `class` varchar(30) NOT NULL COMMENT 'Class Name',
  `c_section_Id` int(10) DEFAULT NULL COMMENT 'Section of this class',
  `numeric_name` varchar(255) NOT NULL,
  `no_of_period` varchar(255) NOT NULL,
  `tuition_fee` varchar(255) NOT NULL,
  `sub_Id` int(10) DEFAULT NULL COMMENT 'Subjects assigned to a class',
  `subject` varchar(255) NOT NULL,
  `sc_sec_Id` int(10) NOT NULL COMMENT 'School Section Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cls_Id`, `class`, `c_section_Id`, `numeric_name`, `no_of_period`, `tuition_fee`, `sub_Id`, `subject`, `sc_sec_Id`) VALUES
(1, 'One', NULL, '12', '3', '5000', NULL, '1,2,3', 9),
(2, 'Two', NULL, '2', '3', '5000', NULL, '1,2,3', 10),
(3, 'Three', NULL, '3', '3', '5000', NULL, '1,2,3,4', 10),
(4, 'Four', NULL, '4', '4', '5000', NULL, '1,2,3,4', 10),
(5, 'Five', NULL, '5', '4', '5000', NULL, '1,2,3,4', 10),
(6, 'Six', NULL, '6', '4', '5000', NULL, '1,2,3,4', 4),
(7, 'Seven', NULL, '2', '3', '10000', NULL, '1,2,3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `class-rep`
--

DROP TABLE IF EXISTS `class-rep`;
CREATE TABLE `class-rep` (
  `crep_Id` int(10) NOT NULL COMMENT 'Class Rep Id',
  `std_Id` int(10) DEFAULT NULL COMMENT 'Student Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classwise_attendace`
--

DROP TABLE IF EXISTS `classwise_attendace`;
CREATE TABLE `classwise_attendace` (
  `cls_att_Id` bigint(100) NOT NULL COMMENT 'Classwise Attendance ID',
  `att_typ_Id` int(10) DEFAULT NULL COMMENT 'Attendance type''s ID',
  `cls_Id` int(10) DEFAULT NULL COMMENT 'Class ID',
  `sub_Id` int(10) DEFAULT NULL COMMENT 'Subjectwise attendance ID',
  `cls_att_Status` enum('Active','Inactive') NOT NULL COMMENT 'Status of class attendance'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_section`
--

DROP TABLE IF EXISTS `class_section`;
CREATE TABLE `class_section` (
  `c_section_Id` int(10) NOT NULL COMMENT 'Section ID',
  `class_section_name` varchar(10) NOT NULL COMMENT 'Name of the class section',
  `crep_Id` int(11) NOT NULL,
  `students` varchar(255) NOT NULL,
  `cls_Id` int(10) NOT NULL,
  `no_of_student` varchar(50) NOT NULL,
  `emp_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_section`
--

INSERT INTO `class_section` (`c_section_Id`, `class_section_name`, `crep_Id`, `students`, `cls_Id`, `no_of_student`, `emp_Id`) VALUES
(1, 'Green', 7, '[\"6\",\"7\"]', 1, '2', 1),
(2, 'Blue', 9, '8,9', 1, '2', 2),
(3, 'Red', 8, '8,9', 1, '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE `designation` (
  `desig_Id` int(10) NOT NULL COMMENT 'Designation ID',
  `designation` varchar(100) DEFAULT NULL COMMENT 'Designation Name',
  `desig_Status` enum('Active','Inactive') NOT NULL COMMENT 'Designation Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desig_Id`, `designation`, `desig_Status`) VALUES
(1, 'Teacher', 'Inactive'),
(2, 'Accountant', 'Inactive'),
(3, 'Admin', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `disable`
--

DROP TABLE IF EXISTS `disable`;
CREATE TABLE `disable` (
  `disable_Id` int(10) NOT NULL COMMENT 'Disable ID',
  `disable_status` enum('Yes','No') NOT NULL,
  `disability` varchar(255) DEFAULT NULL COMMENT 'Disability Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disable`
--

INSERT INTO `disable` (`disable_Id`, `disable_status`, `disability`) VALUES
(1, 'Yes', 'Eye Site is Weak'),
(3, 'No', 'No Disable Status');

-- --------------------------------------------------------

--
-- Table structure for table `discount_type`
--

DROP TABLE IF EXISTS `discount_type`;
CREATE TABLE `discount_type` (
  `dis_typ_Id` int(10) NOT NULL COMMENT 'Discount Type ID',
  `dis_Name` varchar(50) NOT NULL COMMENT 'Discount type Name',
  `dis_Percent` int(10) NOT NULL COMMENT 'Percentage of discount type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `domicile`
--

DROP TABLE IF EXISTS `domicile`;
CREATE TABLE `domicile` (
  `dom_Id` int(10) NOT NULL COMMENT 'Domicile ID',
  `dom_District` varchar(30) NOT NULL COMMENT 'Name of the domicile'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domicile`
--

INSERT INTO `domicile` (`dom_Id`, `dom_District`) VALUES
(1, 'Bannu'),
(2, 'Karak'),
(4, 'Rawalpindi');

-- --------------------------------------------------------

--
-- Table structure for table `edu_department`
--

DROP TABLE IF EXISTS `edu_department`;
CREATE TABLE `edu_department` (
  `pk_reg_Id` int(20) NOT NULL COMMENT 'REgistration Id',
  `reg_No` varchar(50) DEFAULT NULL COMMENT 'REgistratoin No',
  `reg_department` varchar(50) DEFAULT NULL COMMENT 'REgistration Department'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

DROP TABLE IF EXISTS `emergency_contact`;
CREATE TABLE `emergency_contact` (
  `emer_cnt_Id` int(10) NOT NULL COMMENT 'Student Emergency ID',
  `emer_cont_Name` varchar(255) NOT NULL COMMENT 'Emergency contact person name',
  `emer_cont_No` varchar(20) NOT NULL COMMENT 'Emergency contact Number',
  `fk_emer_relat_Id` int(20) NOT NULL COMMENT 'Relation of emergency contact with pupil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`emer_cnt_Id`, `emer_cont_Name`, `emer_cont_No`, `fk_emer_relat_Id`) VALUES
(1, 'Abdulllah', '012345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

DROP TABLE IF EXISTS `employee_attendance`;
CREATE TABLE `employee_attendance` (
  `emp_att_Id` bigint(100) NOT NULL COMMENT 'Employee Attendance ID',
  `emp_Id` bigint(20) NOT NULL COMMENT 'Employee ID',
  `emp_att_Date` date NOT NULL COMMENT 'Date of Attendance',
  `att_typ_Id` int(10) NOT NULL COMMENT 'ID of Attendance Type',
  `tot_on_Days` bigint(10) DEFAULT NULL COMMENT 'Total days school was open',
  `tot_present_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a employee was present',
  `tot_absentee_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a employee was Absent',
  `tot_sickLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total days an employee was on sick leave',
  `tot_casualLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total casual leave days of an employee',
  `tot_paidLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total Paid Leaves days of an employee',
  `tot_present_Att` bigint(10) DEFAULT NULL COMMENT 'Total present attendance of employee',
  `tot_absentee_Att` bigint(10) DEFAULT NULL COMMENT 'Total absent Attendance of employee',
  `tot_casualLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total casual leave attendance of an employee',
  `tot_sickLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total sick leave attendance of an employee',
  `tot_paidLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total paid Leaves in Attendance of an employee',
  `emp_tot_att` bigint(10) DEFAULT NULL COMMENT 'Total Obtained attendance of employee',
  `emp_arr_Time` time NOT NULL COMMENT 'Arrival Time',
  `emp_dep_Time` time NOT NULL COMMENT 'Departure from school',
  `emp_purp_Lv` varchar(100) DEFAULT NULL COMMENT 'Purpose of leave when an employee is on leave',
  `emp_att_Status` enum('Active','Inactive') NOT NULL COMMENT 'Employee Attendance Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact`
--

DROP TABLE IF EXISTS `employee_contact`;
CREATE TABLE `employee_contact` (
  `emp_cnt_Id` bigint(10) NOT NULL COMMENT 'Employee contact table Id',
  `emp_mob_Ph` bigint(20) DEFAULT NULL COMMENT 'Employee mobile',
  `emp_home_Ph` bigint(20) DEFAULT NULL COMMENT 'Employee home phone',
  `emp_Email` varchar(20) DEFAULT NULL COMMENT 'Employee Email Address',
  `emp_mail_Add` varchar(200) DEFAULT NULL COMMENT 'Employee mailing address',
  `emp_pmt_Add` varchar(200) DEFAULT NULL COMMENT 'Employee permanent address',
  `emp_City` varchar(20) DEFAULT NULL COMMENT 'Employee City',
  `emp_District` varchar(20) DEFAULT NULL COMMENT 'Employee District'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_contact`
--

INSERT INTO `employee_contact` (`emp_cnt_Id`, `emp_mob_Ph`, `emp_home_Ph`, `emp_Email`, `emp_mail_Add`, `emp_pmt_Add`, `emp_City`, `emp_District`) VALUES
(1, 3339654236, 51123456, 'refaqatkhattak88@gma', 'CMT Golra', 'Mandawa, Karak', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

DROP TABLE IF EXISTS `employee_info`;
CREATE TABLE `employee_info` (
  `emp_Id` bigint(20) NOT NULL COMMENT 'Employee ID',
  `emp_Cnic` bigint(20) NOT NULL COMMENT 'Employee National ID Card Number',
  `emp_Img` longblob DEFAULT NULL COMMENT 'Employee Image',
  `emp_NTN` int(20) DEFAULT NULL COMMENT 'National Tax Number',
  `emp_Fname` varchar(20) NOT NULL COMMENT 'Employee First Name',
  `emp_Mname` varchar(20) DEFAULT NULL COMMENT 'Employee Middle Name',
  `emp_Lname` varchar(20) NOT NULL COMMENT 'Employee Last Name',
  `emp_fat_Name` varchar(50) NOT NULL COMMENT 'Employee Father Name',
  `emp_Dob` date NOT NULL COMMENT 'Employee Birth Date',
  `gnd_Id` int(10) NOT NULL COMMENT 'Employee Gender',
  `emp_marital_Status` enum('Single','Married','Divorced','Separated','Widowed') NOT NULL COMMENT 'Employee Marital Status',
  `nation_Id` int(10) NOT NULL COMMENT 'Nationality of Employee',
  `dom_Id` int(10) NOT NULL COMMENT 'Domicile Id',
  `cast_Id` int(10) NOT NULL COMMENT 'Cast ID',
  `relig_Id` int(10) NOT NULL COMMENT 'Religion ID',
  `bg_Id` int(10) DEFAULT NULL COMMENT 'Blood Group ID',
  `emp_typ_Id` int(10) NOT NULL COMMENT 'Employee Type Id',
  `sub_Id` int(10) NOT NULL COMMENT 'Subject ID',
  `prev_exper_Id` int(10) DEFAULT NULL COMMENT 'Previous Experience ID',
  `acdm_qual_Id` bigint(10) DEFAULT NULL COMMENT 'Employee Academic Qualification',
  `prof_qual_Id` bigint(10) DEFAULT NULL COMMENT 'Employee Professional Qualification',
  `disable_Id` int(10) NOT NULL COMMENT 'Disability of employee',
  `emp_cnt_Id` bigint(10) DEFAULT NULL COMMENT 'Employee contact Infomation Id',
  `empt_Id` bigint(10) DEFAULT NULL COMMENT 'Employment Info ID',
  `c_section_Id` int(10) DEFAULT NULL COMMENT 'Class section ID',
  `emer_cnt_Id` int(10) DEFAULT NULL COMMENT 'Emergency contact ID',
  `salary_Id` bigint(10) DEFAULT NULL COMMENT 'Salary ID',
  `emp_Status` enum('Active','Inactive') NOT NULL COMMENT 'Active or Inactive status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`emp_Id`, `emp_Cnic`, `emp_Img`, `emp_NTN`, `emp_Fname`, `emp_Mname`, `emp_Lname`, `emp_fat_Name`, `emp_Dob`, `gnd_Id`, `emp_marital_Status`, `nation_Id`, `dom_Id`, `cast_Id`, `relig_Id`, `bg_Id`, `emp_typ_Id`, `sub_Id`, `prev_exper_Id`, `acdm_qual_Id`, `prof_qual_Id`, `disable_Id`, `emp_cnt_Id`, `empt_Id`, `c_section_Id`, `emer_cnt_Id`, `salary_Id`, `emp_Status`) VALUES
(1, 1402038551477, NULL, 111111, 'Muhammad ', 'Zafran', 'Khattak', 'Muhammad Isamil', '1988-04-10', 1, 'Single', 1, 2, 1, 1, 3, 1, 1, 1, 1, 1, 3, 1, 1, 1, 1, 1, 'Active'),
(3, 142552588888, NULL, 3333333, 'Muhammad ', '', 'Zahid', 'Muhammad Kamran', '1988-04-10', 1, 'Single', 1, 2, 1, 1, 3, 1, 1, 1, 1, 1, 3, 1, 1, 1, 1, 1, 'Active'),
(4, 14020345687877, NULL, 222222, 'Muhammad ', '', 'Kamran', 'Muhammad Kamran', '1988-04-10', 1, 'Single', 1, 2, 1, 1, 3, 1, 1, 1, 1, 1, 3, 1, 1, 1, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

DROP TABLE IF EXISTS `employee_type`;
CREATE TABLE `employee_type` (
  `emp_typ_Id` int(10) NOT NULL COMMENT 'Employee type''s ID',
  `emp_Type` enum('Teaching','None Teaching') NOT NULL COMMENT 'Employee type''s name',
  `desig_Id` int(10) NOT NULL COMMENT 'Designation ID of employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`emp_typ_Id`, `emp_Type`, `desig_Id`) VALUES
(1, 'Teaching', 1),
(2, 'None Teaching', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employment_info`
--

DROP TABLE IF EXISTS `employment_info`;
CREATE TABLE `employment_info` (
  `empt_Id` bigint(10) NOT NULL COMMENT 'Employment table ID',
  `personal_No` bigint(10) NOT NULL COMMENT 'Personal No',
  `appt_Date` date DEFAULT NULL COMMENT 'Apointment Date',
  `adjust_Date` date DEFAULT NULL COMMENT 'Adjustment Date',
  `tot_Service` varchar(50) DEFAULT NULL COMMENT 'Duration of service',
  `empt_Status` enum('Full Time') DEFAULT NULL COMMENT 'Employment Status',
  `contract_Type` enum('Permanent') DEFAULT NULL COMMENT 'Contract Type',
  `contract_Duration` int(10) DEFAULT NULL COMMENT 'contract duration'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment_info`
--

INSERT INTO `employment_info` (`empt_Id`, `personal_No`, `appt_Date`, `adjust_Date`, `tot_Service`, `empt_Status`, `contract_Type`, `contract_Duration`) VALUES
(1, 3339654236, '2013-07-01', '2017-07-31', '4', 'Full Time', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `entity_type`
--

DROP TABLE IF EXISTS `entity_type`;
CREATE TABLE `entity_type` (
  `ent_typ_Id` int(10) NOT NULL COMMENT 'Entity Type ID',
  `ent_typ_Name` enum('General','Library') NOT NULL COMMENT 'Entity Type Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

DROP TABLE IF EXISTS `examination`;
CREATE TABLE `examination` (
  `exm_Id` bigint(100) NOT NULL COMMENT 'Exam ID',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student''s ID',
  `exm_Date` date NOT NULL COMMENT 'Exam Date',
  `exm_typ_Id` int(10) NOT NULL COMMENT 'Exma Type''s ID',
  `b-univ_Regno` double(10,2) DEFAULT NULL COMMENT 'Board or University Reg No',
  `sub_OMks` float(10,2) NOT NULL COMMENT 'Subject''s Obtained Marks',
  `sub_pass_Status` enum('Pass','Fail') NOT NULL COMMENT 'Subject''s Pass or Fail',
  `MT_CM` float(10,2) DEFAULT NULL COMMENT 'Monthly test Credit Marks',
  `mid_CM` float(10,2) DEFAULT NULL COMMENT 'Mid term Credit Marks',
  `att_CM` float(10,2) DEFAULT NULL COMMENT 'Attendance Credit Marks {(std_tot_att)/(tot_on_Days)*50}',
  `exm_tot_Mks` float(10,2) NOT NULL COMMENT 'Exam Total Marks',
  `exm_obt_Mks` float(10,2) NOT NULL COMMENT 'Exam Obtained Marks',
  `exm_obt_Percent` float(10,2) NOT NULL COMMENT 'Exam Obtained Percentage',
  `exm_pass_Status` enum('Pass','Fail') NOT NULL COMMENT 'Exam Pass or Fail Status',
  `grade_Id` int(10) NOT NULL COMMENT 'Grade achieved in Exam',
  `exm_std_Behav` varchar(100) DEFAULT NULL COMMENT 'Pupil''s Behaviour',
  `sub_Id` int(10) NOT NULL COMMENT 'Subject''s ID',
  `exm_Remark` varchar(100) DEFAULT NULL COMMENT 'Exam related Remarks by Controller of Exam or Teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

DROP TABLE IF EXISTS `exam_type`;
CREATE TABLE `exam_type` (
  `exm_typ_Id` int(10) NOT NULL COMMENT 'Exam Type''s ID',
  `exm_typ_Name` varchar(50) NOT NULL COMMENT 'Exam Type''s Name',
  `exm_pass_Percent` float(10,2) NOT NULL COMMENT 'Exam Required Percentage for Passing',
  `exm_typ_Status` enum('Active','Inactive') NOT NULL COMMENT 'Exam Type Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

DROP TABLE IF EXISTS `fee`;
CREATE TABLE `fee` (
  `fee_Id` int(10) NOT NULL COMMENT 'Fee ID',
  `fee_Name` varchar(50) NOT NULL COMMENT 'Fee Name',
  `fee_Amount` double(10,2) NOT NULL COMMENT 'Fee Amount',
  `cls_Id` int(10) NOT NULL COMMENT 'Class ID',
  `fee_Status` enum('Active','Inactive') NOT NULL COMMENT 'Fee Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

DROP TABLE IF EXISTS `fine`;
CREATE TABLE `fine` (
  `fine_Id` bigint(10) NOT NULL COMMENT 'Fine Id',
  `fine_Name` varchar(30) DEFAULT NULL COMMENT 'Fine Name',
  `fine_Amount` double(10,2) DEFAULT NULL COMMENT 'Fine Amount',
  `cls_Id` int(10) DEFAULT NULL COMMENT 'Class Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender` (
  `gnd_Id` int(10) NOT NULL COMMENT 'Gender ID',
  `gender` enum('Male','Female','Transgender') NOT NULL COMMENT 'Name of Gender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gnd_Id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Transgender');

-- --------------------------------------------------------

--
-- Table structure for table `general_entity`
--

DROP TABLE IF EXISTS `general_entity`;
CREATE TABLE `general_entity` (
  `gent_Code` bigint(20) NOT NULL COMMENT 'General Enity Code',
  `gent_Name` varchar(50) NOT NULL COMMENT 'General Entity Name',
  `gent_single_Price` double(10,2) DEFAULT NULL COMMENT 'Single Entity Price',
  `gent_Quantity` bigint(10) NOT NULL COMMENT 'General Entity Quantity',
  `gent_tot_Price` double(10,2) NOT NULL COMMENT 'Price of the entity',
  `gent_Discount` double(10,2) DEFAULT NULL COMMENT 'Discount on General Entity',
  `supp_Id` bigint(10) DEFAULT NULL COMMENT 'Supplier ID of the entity'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `grade_Id` int(10) NOT NULL COMMENT 'Grade ID',
  `grade_Name` varchar(10) NOT NULL COMMENT 'Name of grade',
  `grade_st_Mks` float(10,2) NOT NULL COMMENT 'Grade Starting marks range',
  `grade_end_Mks` float(10,2) NOT NULL COMMENT 'Grade ending marks range'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_Id`, `grade_Name`, `grade_st_Mks`, `grade_end_Mks`) VALUES
(1, '1st', 2583.00, 3800.00);

-- --------------------------------------------------------

--
-- Table structure for table `last_school`
--

DROP TABLE IF EXISTS `last_school`;
CREATE TABLE `last_school` (
  `lsch_Id` int(10) NOT NULL COMMENT 'Last school Id',
  `lsch_Name` varchar(100) NOT NULL COMMENT 'Last school Name',
  `lsch_lv_Date` date NOT NULL COMMENT 'Last school leaving date',
  `lsch_Comments` varchar(100) NOT NULL COMMENT 'Last school comments',
  `lsch_slc_img` longblob DEFAULT NULL COMMENT 'Last school SLc',
  `lsch_contact_No` varchar(20) NOT NULL COMMENT 'Last SchoolNo',
  `lsch_class_Passed` varchar(10) NOT NULL COMMENT 'Class passed from last school'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `last_school`
--

INSERT INTO `last_school` (`lsch_Id`, `lsch_Name`, `lsch_lv_Date`, `lsch_Comments`, `lsch_slc_img`, `lsch_contact_No`, `lsch_class_Passed`) VALUES
(1, 'PAF', '2020-02-17', 'Good', NULL, '0123456789', '10');

-- --------------------------------------------------------

--
-- Table structure for table `library_entity`
--

DROP TABLE IF EXISTS `library_entity`;
CREATE TABLE `library_entity` (
  `lent_Code` bigint(20) NOT NULL COMMENT 'Library Entity Code',
  `pub_Id` bigint(10) DEFAULT NULL COMMENT 'Publishe ID',
  `auth_Id` bigint(10) DEFAULT NULL COMMENT 'Author ID',
  `edition_Id` int(10) DEFAULT NULL COMMENT 'Edition Id',
  `gent_Code` bigint(20) DEFAULT NULL COMMENT 'General Entity Code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_floor`
--

DROP TABLE IF EXISTS `library_floor`;
CREATE TABLE `library_floor` (
  `floor_Id` int(10) NOT NULL COMMENT 'Library Floor ID',
  `floor_Name` varchar(30) NOT NULL COMMENT 'Library Floor Name',
  `shelf_Id` int(10) NOT NULL COMMENT 'Floor''s Shelf ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_info`
--

DROP TABLE IF EXISTS `library_info`;
CREATE TABLE `library_info` (
  `stat_Id` bigint(20) NOT NULL COMMENT 'Stationary ID',
  `lent_Code` bigint(20) NOT NULL COMMENT 'Library Entity Code',
  `stat_categ_Id` int(10) NOT NULL COMMENT 'Stationary Category (Book, Magzine, Newspaper)',
  `pub_Id` bigint(10) DEFAULT NULL COMMENT 'Publisher ID',
  `auth_Id` bigint(10) DEFAULT NULL COMMENT 'Authors Id',
  `edition_Id` int(10) DEFAULT NULL COMMENT 'Edition Id',
  `supp_Id` bigint(10) DEFAULT NULL COMMENT 'Supplier ID',
  `floor_Id` int(10) DEFAULT NULL COMMENT 'Library Floor ID',
  `stat_iss_Date` date DEFAULT NULL COMMENT 'Stationary issue date',
  `stat_ret_Date` date DEFAULT NULL COMMENT 'Stationary return Date',
  `stat_alert_Type` enum('0','1') NOT NULL COMMENT 'Stationary alert status for return time',
  `stat_ret_Condition` enum('Ok','Damaged','Lost') NOT NULL COMMENT 'Stationary condition at return',
  `std_Id` bigint(20) DEFAULT NULL COMMENT 'Student ID from student_info Table',
  `emp_Id` bigint(20) DEFAULT NULL COMMENT 'Employee ID from employee_info'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_rack`
--

DROP TABLE IF EXISTS `library_rack`;
CREATE TABLE `library_rack` (
  `rack_Id` int(10) NOT NULL COMMENT 'Library Shelf Rack ID',
  `rack_No` int(10) NOT NULL COMMENT 'Shelf''s Rack Number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_shelf`
--

DROP TABLE IF EXISTS `library_shelf`;
CREATE TABLE `library_shelf` (
  `shelf_Id` int(10) NOT NULL COMMENT 'Library Shelf ID',
  `shelf_No` int(10) NOT NULL COMMENT 'Library Shelf No',
  `rack_Id` int(10) NOT NULL COMMENT 'Shelf Rack ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

DROP TABLE IF EXISTS `marital_status`;
CREATE TABLE `marital_status` (
  `pk_marital_id` int(11) NOT NULL,
  `marital_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`pk_marital_id`, `marital_status`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Divorced'),
(5, 'Separated');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

DROP TABLE IF EXISTS `nationality`;
CREATE TABLE `nationality` (
  `nation_Id` int(10) NOT NULL COMMENT 'Nationality ID',
  `nationality` varchar(50) NOT NULL COMMENT 'Name of the Nationality'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nation_Id`, `nationality`) VALUES
(1, 'Pakistani'),
(2, 'Bangladesh'),
(3, 'Nepal'),
(6, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

DROP TABLE IF EXISTS `occupation`;
CREATE TABLE `occupation` (
  `occup_Id` int(10) NOT NULL COMMENT 'Occupation ID',
  `occup_Name` varchar(50) NOT NULL COMMENT 'Profession Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`occup_Id`, `occup_Name`) VALUES
(1, 'Doctor'),
(2, 'Engineer'),
(3, 'Accountant'),
(4, 'Actor'),
(5, 'Agriculturist'),
(6, 'Former');

-- --------------------------------------------------------

--
-- Table structure for table `parent_employer`
--

DROP TABLE IF EXISTS `parent_employer`;
CREATE TABLE `parent_employer` (
  `pnt_empy_Id` bigint(10) NOT NULL COMMENT 'Employer ID',
  `pnt_Employer` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Employer Name',
  `pnt_emp_Add` varchar(300) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Employer Address',
  `pnt_emp_Cnt` int(20) DEFAULT NULL COMMENT 'Employer contact'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent_info`
--

DROP TABLE IF EXISTS `parent_info`;
CREATE TABLE `parent_info` (
  `pnt_Id` bigint(20) NOT NULL COMMENT 'Parent ID',
  `guardian_image` varchar(255) NOT NULL,
  `pnt_Fname` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Parent First Name',
  `pnt_Mname` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Parent Middle Name',
  `pnt_Lname` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Parent Last Name',
  `pnt_Cnic` bigint(20) NOT NULL COMMENT 'Parent National ID Card',
  `gnd_Id` int(10) NOT NULL COMMENT 'Gender from Gen Table',
  `occup_Id` int(10) NOT NULL COMMENT 'Parent Profession',
  `std_Id` bigint(20) DEFAULT NULL COMMENT 'Student ID from Student Info Table',
  `fk_relat_Id` int(20) NOT NULL COMMENT 'Relationship with pupil',
  `pnt_empy_Id` bigint(10) DEFAULT NULL COMMENT 'Parent employer ID',
  `desig_Id` int(10) DEFAULT NULL COMMENT 'Parent Designation ID',
  `pnt_marital_Status` enum('Divorced','Separated','Widow') DEFAULT NULL,
  `prnt_employer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_info`
--

INSERT INTO `parent_info` (`pnt_Id`, `guardian_image`, `pnt_Fname`, `pnt_Mname`, `pnt_Lname`, `pnt_Cnic`, `gnd_Id`, `occup_Id`, `std_Id`, `fk_relat_Id`, `pnt_empy_Id`, `desig_Id`, `pnt_marital_Status`, `prnt_employer_name`) VALUES
(1, 'guardian1615531771.jpg', 'Muhmmad', 'Refaqat', 'Khattak', 1420245942707, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(4, 'guardian1615532896.jpg', 'Muhmmad', 'Shafiq', 'Khattak', 1420212345678, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(5, 'guardian1615535553.jpg', 'Ayesha', 'Sana', 'Fatima', 14202123456987, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(6, 'guardian1615544912.png', 'Khadija', 'khan', 'Khatoon', 1420864654566, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(7, 'guardian1615544972.jpg', 'Zainab', 'khan', 'Khatoon', 1420813234354656, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(8, 'guardian1615546059.png', 'Humza', 'Khan', 'Marwat', 14202423523525, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(9, 'guardian1615546394.jpg', 'Ayub', 'Khan', 'Bangash', 14202324235245, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(10, 'guardian1615546555.jpg', 'Tina', 'Baganza', 'Albert', 142024234231532, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(11, 'guardian1615546778.jpg', 'Gulalai', 'Khan', 'Wazir', 14202832652656, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(12, 'guardian1615547493.jpg', 'Ayesha1', 'Sana1', 'Fatima1', 142021976866545, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(13, 'guardian1615547636.jpg', 'Muhmmad', 'Bilal', 'Khan', 1420243625674, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(14, 'guardian1615548138.jpg', 'Bilqees', 'Khan', 'Khatoon', 14202214235235, 1, 3, NULL, 2, NULL, 3, NULL, 'Agriculture'),
(15, 'guardian1615548834.jpg', 'Guljana', 'Ayub', 'Munaza', 14202987654321, 2, 1, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(16, 'guardian1615550705.jpg', 'Gul', 'Khan', 'Marwat', 1420223432235, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(17, 'guardian1615555051.png', 'Abu', 'Jawad', 'Khan', 1420245346356, 1, 3, NULL, 1, NULL, 1, NULL, 'Point Web Tech'),
(18, 'guardian1615558099.jpg', 'Khan', 'Jaffar', 'Khan', 142028795613132, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(19, 'guardian1615558499.jpg', 'Hello', 'Hello', 'Hello', 142035324626, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(20, 'guardian1615558674.jpg', 'Abbas', 'Abbas', 'Abbas', 14202543262436, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(21, 'guardian1615558869.jpg', 'Ijaz', 'Ijaz', 'Ijaz', 14202352354363427, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(22, 'guardian1615559073.jpg', 'Syed', 'Syed', 'Syed', 14202523462357, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(23, 'guardian1615559372.jpg', 'Ghulam', 'Ghulam', 'Ghulam', 142025435243, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(24, 'guardian1615560064.jpg', 'Rukhsana', 'Khan', 'Khatoon', 14202323546264, 2, 3, NULL, 1, NULL, 2, NULL, 'Agriculture'),
(25, 'guardian1615560754.jpg', 'Saima', 'Khan', 'Khattak', 1420298765432, 1, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(26, 'guardian1615620205.jpg', 'Arsalan', 'Ahmed', 'Khan', 1420242135324, 1, 3, NULL, 1, NULL, 2, NULL, 'Agriculture'),
(27, 'guardian1615635414.jpg', 'Yousaf', 'Khan', 'Bangash', 142025646464, 1, 3, NULL, 1, NULL, 2, NULL, 'Zong'),
(28, 'guardian1615635920.jpg', 'Gulshan', 'Afridi', 'Khan', 14202325123534, 1, 3, NULL, 1, NULL, 2, NULL, 'Gadwad Software'),
(29, 'guardian1615636205.jpg', 'Naina', 'Khan', 'Afridi', 1420254363465, 1, 3, NULL, 1, NULL, 2, NULL, 'Agriculture Department Rawalpindi'),
(30, 'guardian1615636362.jpg', 'Rizwana', 'Khan', 'Afridi', 14202534635657, 2, 3, NULL, 1, NULL, 2, NULL, 'Agriculture Department Rawalpindi'),
(31, 'guardian1615636563.jpg', 'Imran', 'Khan', 'Niazi', 1420298542255, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(32, 'guardian1615636757.jpg', 'Waqas', 'Khan', 'Khattak', 1420299996633, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(33, 'guardian1615636907.jpg', 'Asif', 'Ali', 'Zardari', 142022432523536, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(34, 'guardian1615637241.jpg', 'Rehman', 'Gul', 'Afridi', 1320145942707, 1, 3, NULL, 1, NULL, 2, NULL, 'Web Tech'),
(35, 'guardian1615637479.jpg', 'Badin', 'Khan', 'Butt', 13202456987321, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(36, 'guardian1615637686.jpg', 'Gulzar', 'Khan', 'Khattak', 14203899131132, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(37, 'guardian1615638043.jpg', 'Abdullah', 'Khan', 'Khattak', 14202464567457, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(38, 'guardian1615638373.jpg', 'Ghani', 'Khan', 'Baba', 14205656463633, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(39, 'guardian1615638518.jpg', 'Arif', 'Khan', 'Khattak', 1420243654747, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(40, 'guardian1615640475.jpg', 'Zunaira', 'Khan', 'Khatoon', 132054569872, 1, 3, NULL, 1, NULL, 2, NULL, 'Agriculture Department Rawalpindi'),
(41, 'guardian1615640636.jpg', 'Naila', 'Khatoon', 'Khan', 13206547658856, 1, 3, NULL, 2, NULL, 2, NULL, 'Agriculture Department Rawalpindi'),
(42, 'guardian1615640815.jpg', 'Rafia', 'Khatoon', 'Khan', 132063253253246, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture Department Rawalpindi'),
(43, 'guardian1615641791.jpg', 'Inam', 'Ullah', 'Khan', 14209542364, 1, 3, NULL, 1, NULL, 2, NULL, 'Point Web Tech'),
(44, 'guardian1615641967.jpg', 'Zarina', 'Khan', 'Bibi', 1420684658459, 1, 3, NULL, 2, NULL, 2, NULL, 'Agriculture Department Rawalpindi'),
(45, 'guardian1615642164.jpg', 'Hina', 'Khan', 'Khatoon', 142024356346347, 1, 3, NULL, 2, NULL, 2, NULL, 'Agriculture'),
(46, 'guardian1615642417.jpg', 'Ghazala', 'Javed', 'Khan', 142025747568568, 2, 3, NULL, 2, NULL, 2, NULL, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

DROP TABLE IF EXISTS `payment_mode`;
CREATE TABLE `payment_mode` (
  `PM_Id` int(10) NOT NULL COMMENT 'Payment Mode ID',
  `PM_Name` varchar(20) NOT NULL COMMENT 'Mode of the payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prev_experience`
--

DROP TABLE IF EXISTS `prev_experience`;
CREATE TABLE `prev_experience` (
  `prev_exper_Id` int(10) NOT NULL COMMENT 'Prev Experience ID',
  `prev_exper_Org` varchar(100) DEFAULT NULL COMMENT 'Prev Organisation Name',
  `prev_exper_Position` varchar(50) DEFAULT NULL COMMENT 'Prev Position',
  `prev_exper_Role` varchar(100) DEFAULT NULL COMMENT 'Prev Role',
  `prev_Frmdate` date DEFAULT NULL COMMENT 'Prev Experience From Date',
  `prev_Todate` date DEFAULT NULL COMMENT 'Prev Experience To Date',
  `emp_curr_Org` varchar(100) DEFAULT NULL COMMENT 'Current Organisation Name',
  `prev_exper_Status` enum('Active','Inactive') DEFAULT NULL COMMENT 'Prev Experience Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prev_experience`
--

INSERT INTO `prev_experience` (`prev_exper_Id`, `prev_exper_Org`, `prev_exper_Position`, `prev_exper_Role`, `prev_Frmdate`, `prev_Todate`, `emp_curr_Org`, `prev_exper_Status`) VALUES
(1, 'APS DI Khan', 'IT Teacher', 'Teacher', '2011-04-01', '2011-04-30', 'sadiq Public School', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `professional_qualification`
--

DROP TABLE IF EXISTS `professional_qualification`;
CREATE TABLE `professional_qualification` (
  `prof_qual_Id` bigint(10) NOT NULL COMMENT 'Professional Qualification''s ID',
  `prof_qual_Name` varchar(100) NOT NULL COMMENT 'Professional Qualification''s Name (B.Ed,M.ED)',
  `univ_Id` bigint(10) NOT NULL COMMENT 'Qualification''s University',
  `prof_comp_Session` year(4) NOT NULL COMMENT 'Session degree completed on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professional_qualification`
--

INSERT INTO `professional_qualification` (`prof_qual_Id`, `prof_qual_Name`, `univ_Id`, `prof_comp_Session`) VALUES
(1, 'BCS Hons', 1, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher` (
  `pub_Id` bigint(10) NOT NULL COMMENT 'Publisher ID',
  `pub_Name` varchar(100) NOT NULL COMMENT 'Publisher Name',
  `pub_Contact` bigint(20) DEFAULT NULL COMMENT 'Publisher Contact',
  `pub_Status` enum('Active','Inactive') NOT NULL COMMENT 'Publisher status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_account`
--

DROP TABLE IF EXISTS `purchase_account`;
CREATE TABLE `purchase_account` (
  `purch_Id` bigint(20) NOT NULL COMMENT 'Purchase ID',
  `purch_Date` date NOT NULL COMMENT 'Date of the purchase',
  `ent_typ_Id` int(10) NOT NULL COMMENT 'Type of purchase',
  `PM_Id` int(10) NOT NULL COMMENT 'Mode of payment ID',
  `purch_Payadv` double(10,2) NOT NULL COMMENT 'Payment in advance',
  `purch_Payable` double(10,2) NOT NULL COMMENT 'Payable amount',
  `purch_Remark` varchar(100) DEFAULT NULL COMMENT 'Remarks by the accountant',
  `gent_Code` bigint(20) NOT NULL COMMENT 'General Entity Code',
  `lent_Code` bigint(20) DEFAULT NULL COMMENT 'Library Entity Code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
CREATE TABLE `relationship` (
  `pk_relat_Id` int(20) NOT NULL COMMENT 'Relationship ID',
  `relation_Name` varchar(255) NOT NULL COMMENT 'RElationship'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`pk_relat_Id`, `relation_Name`) VALUES
(1, 'Father'),
(2, 'Mother');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

DROP TABLE IF EXISTS `religion`;
CREATE TABLE `religion` (
  `relig_Id` int(10) NOT NULL COMMENT 'Religion ID',
  `religion` varchar(50) NOT NULL COMMENT 'Name of the religion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`relig_Id`, `religion`) VALUES
(1, 'Muslim'),
(3, 'Christianity'),
(4, 'Hindu'),
(5, 'Buddhism'),
(6, 'Judaism'),
(7, 'No religious affiliation');

-- --------------------------------------------------------

--
-- Table structure for table `salary_account`
--

DROP TABLE IF EXISTS `salary_account`;
CREATE TABLE `salary_account` (
  `sal_Id` bigint(20) NOT NULL COMMENT 'Salary ID',
  `emp_Id` bigint(20) NOT NULL COMMENT 'Employee ID',
  `sal_Month` date DEFAULT NULL COMMENT 'Salary for the month of',
  `sal_voucher_No` bigint(20) DEFAULT NULL COMMENT 'Voucher No on Pay Slip',
  `sal_Basic` double(10,2) NOT NULL COMMENT 'Basic Pay',
  `medical_Allow` double(10,2) DEFAULT NULL COMMENT 'Medical Allowence',
  `house_Allow` double(10,2) DEFAULT NULL COMMENT 'House Allowence',
  `utility_Allow` double(10,2) DEFAULT NULL COMMENT 'Utilities Allowence',
  `education_Allow` double(10,2) DEFAULT NULL COMMENT 'Education Allowence',
  `conveyance_Allow` double(10,2) DEFAULT NULL COMMENT 'Conveyance Allowence',
  `sal_Bonus` double(10,2) DEFAULT NULL COMMENT 'Bonuses given',
  `sal_Gross` double(10,2) DEFAULT NULL COMMENT 'Total Gross Salary',
  `sal_tax_Percent` double(10,2) DEFAULT NULL,
  `PF_emp_Cont` double(10,2) DEFAULT NULL COMMENT '12% of basic salary',
  `tax_Deduct` double(10,2) DEFAULT NULL COMMENT 'Tax Deductions (sal_Gross/100*sal_tax_Percent)',
  `other_Deduct` double(10,2) DEFAULT NULL COMMENT 'Other deductions',
  `tot_Deduct` double(10,2) DEFAULT NULL COMMENT 'Total deductions',
  `sal_Net` double(10,2) DEFAULT NULL COMMENT 'Total Net Salary',
  `sal_Paid` double(10,2) NOT NULL COMMENT 'Paid Salary',
  `sal_Payable` double(10,2) DEFAULT NULL COMMENT 'Salary due',
  `PM_Id` int(10) DEFAULT NULL COMMENT 'Payment Mode of Salary',
  `PFund_empy_Cont` double(10,2) DEFAULT NULL COMMENT '3.67% of basic salary',
  `GP_fund_Balance` double(10,2) DEFAULT NULL COMMENT 'Total General Provident Fund collected',
  `EPS_empy_Cont` double(10,2) DEFAULT NULL COMMENT '8.33% of basic salary, Emp Pension Scheme',
  `EPS_Balance` double(10,2) DEFAULT NULL COMMENT 'EPS Balance tll date',
  `gratuity_Balance` double(10,2) DEFAULT NULL COMMENT 'Total Gratuity balance',
  `sal_Remark` varchar(100) DEFAULT NULL COMMENT 'Salary Remarks'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `pk_school_Id` int(10) NOT NULL COMMENT 'School ID',
  `school_Name` varchar(255) NOT NULL COMMENT 'School Name',
  `school_abbreviation` varchar(255) DEFAULT NULL,
  `principal_Name` varchar(255) DEFAULT NULL COMMENT 'Principal Name',
  `affiliation_No` varchar(255) DEFAULT NULL,
  `board_Id` int(10) DEFAULT NULL COMMENT 'Board of Affiliation',
  `registration` varchar(255) DEFAULT NULL COMMENT 'Registration Department',
  `registered_with` varchar(255) NOT NULL,
  `dom_Id` int(10) DEFAULT NULL COMMENT 'District Name',
  `city_Id` int(10) DEFAULT NULL COMMENT 'City Name',
  `primary_Contact` varchar(20) NOT NULL COMMENT 'Primary contact no',
  `secondary_Contact` varchar(20) DEFAULT NULL COMMENT 'Secondary Contact',
  `school_Add` varchar(255) NOT NULL COMMENT 'Address'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`pk_school_Id`, `school_Name`, `school_abbreviation`, `principal_Name`, `affiliation_No`, `board_Id`, `registration`, `registered_with`, `dom_Id`, `city_Id`, `primary_Contact`, `secondary_Contact`, `school_Add`) VALUES
(2, 'Army Public School', 'APS', 'Shafiq', 'FBISE Islamabad', 1, '136-APS-2021', 'Education Department Punjab', 1, 1, '012345678', '555555555', '7th Road');

-- --------------------------------------------------------

--
-- Table structure for table `school_section`
--

DROP TABLE IF EXISTS `school_section`;
CREATE TABLE `school_section` (
  `sc_sec_Id` int(11) NOT NULL,
  `sc_sec_name` varchar(100) NOT NULL COMMENT 'School Section Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_section`
--

INSERT INTO `school_section` (`sc_sec_Id`, `sc_sec_name`) VALUES
(3, 'High'),
(4, 'Middle'),
(7, 'Higher Secondary'),
(9, 'Pre Primary'),
(10, 'Primary');

-- --------------------------------------------------------

--
-- Table structure for table `stationary_category`
--

DROP TABLE IF EXISTS `stationary_category`;
CREATE TABLE `stationary_category` (
  `stat_categ_Id` int(10) NOT NULL COMMENT 'Stationary category ID',
  `stat_categ_Name` varchar(50) NOT NULL COMMENT 'Stationary category name (Book, Magzine)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stationary_edition`
--

DROP TABLE IF EXISTS `stationary_edition`;
CREATE TABLE `stationary_edition` (
  `edition_Id` int(10) NOT NULL COMMENT 'Book edition ID',
  `edition_N0` int(10) NOT NULL COMMENT 'Book edition Number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

DROP TABLE IF EXISTS `student_account`;
CREATE TABLE `student_account` (
  `std_acc_Id` bigint(20) NOT NULL COMMENT 'Student Account ID',
  `std_voucher_No` bigint(20) NOT NULL COMMENT 'Student Voucher No',
  `std_reciept_Date` date NOT NULL COMMENT 'Date of fee recieved',
  `fee_Id` int(10) NOT NULL COMMENT 'Fee ID',
  `tot_Fee` double(10,2) DEFAULT NULL COMMENT 'Total Fee',
  `dis_typ_Id` int(10) DEFAULT NULL COMMENT 'Discount Type ID',
  `tot_fee_Dis` double(10,2) DEFAULT NULL COMMENT 'Total Discount',
  `fine_Id` bigint(10) DEFAULT NULL COMMENT 'Fine Id',
  `std_tot_Fine` double(10,2) DEFAULT NULL,
  `fee_Recievable` double(10,2) NOT NULL COMMENT 'Total Fee',
  `fee_Recieved` double(10,2) DEFAULT NULL COMMENT 'Recieved Fee',
  `fee_Due` double(10,2) DEFAULT NULL COMMENT 'Fee Due',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student ID from student_info Table',
  `fee_Status` enum('0','1') DEFAULT NULL COMMENT 'To check if the pupil has paid all due or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

DROP TABLE IF EXISTS `student_attendance`;
CREATE TABLE `student_attendance` (
  `std_att_Id` bigint(100) NOT NULL COMMENT 'Student Attendance ID',
  `std_att_Date` date NOT NULL COMMENT 'Date of Attendance',
  `att_typ_Id` int(10) NOT NULL COMMENT 'ID of Attendance Type',
  `tot_on_Days` bigint(10) NOT NULL COMMENT 'Total days school was open',
  `tot_present_Days` bigint(10) NOT NULL COMMENT 'Total days a pupil was present',
  `tot_absentee_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a pupil was Absent',
  `tot_halfLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a pupil was on half leave',
  `tot_Lv_Days` bigint(10) DEFAULT NULL COMMENT 'Total other leaves',
  `tot_late_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a pupil got late',
  `tot_present_Att` bigint(10) DEFAULT NULL COMMENT 'Total present attendance of pupil',
  `tot_absentee_Att` bigint(10) DEFAULT NULL COMMENT 'Total absent Attendance of pupil',
  `tot_halfLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total Halfday Attendance of pupil',
  `tot_Lv_Att` bigint(10) DEFAULT NULL COMMENT 'Total Leaves in Attendance of a pupil',
  `tot_late_Att` bigint(10) DEFAULT NULL COMMENT 'Total Late attendance of a pupil',
  `std_tot_att` bigint(10) DEFAULT NULL COMMENT 'Total Obtained attendance of pupil',
  `std_time_Late` varchar(10) DEFAULT NULL COMMENT 'Lateness time used when a pupil is late',
  `std_time_Lv` time DEFAULT NULL COMMENT 'Time of Leave used when Half Leave is selected',
  `std_purp_Lv` varchar(100) DEFAULT NULL COMMENT 'Purpose of leave when a pupil is on leave',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student ID from student_info Table',
  `cls_att_Id` bigint(100) DEFAULT NULL COMMENT 'Class Attendance ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_category`
--

DROP TABLE IF EXISTS `student_category`;
CREATE TABLE `student_category` (
  `std_cat_Id` int(20) NOT NULL COMMENT 'Category ID',
  `student_category_name` varchar(100) NOT NULL COMMENT 'Category of the student such as Military or Civilian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_category`
--

INSERT INTO `student_category` (`std_cat_Id`, `student_category_name`) VALUES
(1, 'Army');

-- --------------------------------------------------------

--
-- Table structure for table `student_contact`
--

DROP TABLE IF EXISTS `student_contact`;
CREATE TABLE `student_contact` (
  `pnt_cnt_Id` bigint(10) NOT NULL COMMENT 'parent contact table id',
  `pnt_mob_Ph` bigint(20) NOT NULL COMMENT 'parent mob number',
  `pnt_home_Ph` bigint(20) DEFAULT NULL COMMENT 'parent home phone',
  `pnt_off_Ph` bigint(20) DEFAULT NULL COMMENT 'parent office phone',
  `pnt_Email` varchar(50) DEFAULT NULL COMMENT 'parent email address',
  `pnt_mail_Add` varchar(200) DEFAULT NULL COMMENT 'parent mailing address',
  `pnt_pmt_Add` varchar(200) DEFAULT NULL COMMENT 'parent permanent address',
  `pnt_City` varchar(20) DEFAULT NULL COMMENT 'parent City',
  `pnt_District` varchar(20) DEFAULT NULL COMMENT 'parent District'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info` (
  `std_Id` bigint(20) NOT NULL COMMENT 'This is the student''s ID that will be used in Admission No as well',
  `std_Img` longblob DEFAULT NULL COMMENT 'Student''s Image',
  `std_Fname` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Student Fisrt Name',
  `std_Mname` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Student Middle Name',
  `std_Lname` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Student LAst Name',
  `gnd_Id` int(10) NOT NULL COMMENT 'Student''s Gender from Gender Table',
  `std_Dob` date NOT NULL COMMENT 'Student''s DOB',
  `std_Age` float DEFAULT NULL COMMENT 'Student Age Auto Calculated from DOB',
  `nation_Id` int(10) NOT NULL COMMENT 'Nationality from Nation Table',
  `dom_Id` int(10) NOT NULL COMMENT 'Domicile from dom Table',
  `cast_Id` int(10) NOT NULL COMMENT 'Student Cast/Tribe',
  `bg_Id` int(10) NOT NULL COMMENT 'Blood Group from BG Table',
  `relig_Id` int(10) NOT NULL COMMENT 'Religion from Rel Table',
  `std_cat_Id` int(20) NOT NULL COMMENT 'Profession Category of pupil''s Father',
  `disable_Id` int(10) NOT NULL COMMENT 'Dasability Status Disable Table',
  `lsch_Id` int(10) NOT NULL COMMENT 'Last School Attended',
  `emer_cnt_Id` int(10) NOT NULL COMMENT 'Student Emergency contact ID',
  `std_Status` enum('Active','Inactive') CHARACTER SET latin1 NOT NULL COMMENT 'Check if the student is Active or Inactive',
  `adm_No` bigint(100) NOT NULL COMMENT 'Pupil admission no',
  `cls_Id` int(10) NOT NULL COMMENT 'Class in which enrolles',
  `fk_pnt_cnt_Id` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`std_Id`, `std_Img`, `std_Fname`, `std_Mname`, `std_Lname`, `gnd_Id`, `std_Dob`, `std_Age`, `nation_Id`, `dom_Id`, `cast_Id`, `bg_Id`, `relig_Id`, `std_cat_Id`, `disable_Id`, `lsch_Id`, `emer_cnt_Id`, `std_Status`, `adm_No`, `cls_Id`, `fk_pnt_cnt_Id`) VALUES
(6, NULL, 'Shafiq', 'Ur', 'Rehman', 1, '1986-03-02', 30, 1, 2, 1, 3, 1, 1, 3, 1, 1, 'Active', 1, 1, 0),
(7, NULL, 'Shah', 'Ur', 'Rehman', 1, '1986-03-02', 30, 1, 2, 1, 3, 1, 1, 3, 1, 1, 'Active', 1, 1, 0),
(8, NULL, 'Humza', 'Khan', 'Marwat', 1, '1986-03-02', 30, 1, 2, 1, 3, 1, 1, 3, 1, 1, 'Active', 1, 1, 0),
(9, NULL, 'Ijaz', 'Khan', 'Parachenar', 1, '1986-03-02', 30, 1, 2, 1, 3, 1, 1, 3, 1, 1, 'Active', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `sub_Id` int(10) NOT NULL COMMENT 'Subject''s ID',
  `subject` varchar(50) NOT NULL COMMENT 'Subjects''s Name',
  `sub_Code` varchar(100) DEFAULT NULL COMMENT 'Course Code',
  `sub_th_Mks` float(10,2) NOT NULL COMMENT 'Subject''s Theory Marks',
  `sub_prac_Mks` float(10,2) NOT NULL COMMENT 'Subject''s Practical Marks',
  `sub_tot_Mks` float(10,2) NOT NULL COMMENT 'Subject''s Total Marks',
  `sub_pass_Mks` float(10,2) NOT NULL COMMENT 'Subject''s Passing Marks'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_Id`, `subject`, `sub_Code`, `sub_th_Mks`, `sub_prac_Mks`, `sub_tot_Mks`, `sub_pass_Mks`) VALUES
(1, 'English', 'Eng-01', 75.00, 25.00, 100.00, 40.00),
(2, 'Urdu', 'Urdu-01', 100.00, 0.00, 100.00, 40.00),
(3, 'Maths', 'Math-01', 75.00, 25.00, 100.00, 40.00),
(4, 'Islamiyat', 'Islamiyat-01', 75.00, 0.00, 75.00, 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supp_Id` bigint(10) NOT NULL COMMENT 'Supplier ID',
  `supp_Name` varchar(100) NOT NULL COMMENT 'Supplier Name',
  `supp_Contact` bigint(20) DEFAULT NULL COMMENT 'Supplier Contact No',
  `supp_Add` varchar(100) DEFAULT NULL COMMENT 'Supplier Address',
  `supp_Status` enum('Active','Inactive') NOT NULL COMMENT 'Supplier Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `university_list`
--

DROP TABLE IF EXISTS `university_list`;
CREATE TABLE `university_list` (
  `univ_Id` bigint(10) NOT NULL COMMENT 'University ID',
  `univ_Name` varchar(255) NOT NULL COMMENT 'Name of University'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university_list`
--

INSERT INTO `university_list` (`univ_Id`, `univ_Name`) VALUES
(1, 'Kohat University of Science & Technology'),
(3, 'National University of Science & Technology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `user_type`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '14202123456789', 'refaqatkhattak88@gmail.com', 'Super Admin', 'Active', NULL, '$2y$10$.mKJv.IsrfDcJoARdnynX.XfeLqecseN7RpXHVAWZysonEFSGGVei', NULL, '2021-02-18 01:55:55', '2021-02-18 01:55:55'),
(2, 'Muhammad Refaqat', 'refaqat88', NULL, 'Teacher', 'Inactive', NULL, '$2y$10$.mKJv.IsrfDcJoARdnynX.XfeLqecseN7RpXHVAWZysonEFSGGVei', NULL, '2021-02-17 07:04:19', '2021-02-18 01:19:26'),
(3, 'Muhammad Ijaz', 'Ijaz', NULL, 'Teacher', 'Active', NULL, '$2y$10$zYCbMrtS/CaSv60XiASX3e4U6fXnnKQ89iE8gu8GqzqOH.AgNY4NG', NULL, '2021-02-17 07:10:55', '2021-02-17 07:10:55'),
(4, 'Humza Khan', '1420245942707', NULL, 'Accountant', 'Inactive', NULL, '$2y$10$.mKJv.IsrfDcJoARdnynX.XfeLqecseN7RpXHVAWZysonEFSGGVei', NULL, '2021-02-17 07:21:41', '2021-02-17 09:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_id`
--

DROP TABLE IF EXISTS `user_role_id`;
CREATE TABLE `user_role_id` (
  `user_role_Id` int(10) NOT NULL COMMENT 'User Role',
  `user_role_Name` varchar(20) NOT NULL COMMENT 'User Role',
  `user_right_Id` int(10) NOT NULL COMMENT 'User Rights'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `user_type_Name` varchar(20) NOT NULL COMMENT 'User type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_Name`) VALUES
('admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_school`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_school`;
CREATE TABLE `view_school` (
`school` int(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawl_student`
--

DROP TABLE IF EXISTS `withdrawl_student`;
CREATE TABLE `withdrawl_student` (
  `with_Id` bigint(20) NOT NULL COMMENT 'Withdrawl ID',
  `with_Date` date NOT NULL COMMENT 'Date of Withdrawl',
  `with_Reason` varchar(100) NOT NULL COMMENT 'Reason of withdrawl',
  `with_Remark` varchar(100) NOT NULL COMMENT 'Remarks by the school on withdrawl',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `view_school`
--
DROP TABLE IF EXISTS `view_school`;

DROP VIEW IF EXISTS `view_school`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_school`  AS SELECT `schools`.`pk_school_Id` AS `school` FROM (((`schools` join `domicile` on(`schools`.`dom_Id` = `domicile`.`dom_Id`)) join `cities` on(`schools`.`city_Id` = `cities`.`pk_city_id`)) left join `boards` on(`schools`.`board_Id` = `boards`.`pk_board_Id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  ADD PRIMARY KEY (`acdm_qual_Id`),
  ADD KEY `academic_qualification_subfk` (`sub_Id`),
  ADD KEY `academic_qualification_univfk` (`univ_Id`),
  ADD KEY `academic_qualification_gradefk` (`grade_Id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`adm_No`);

--
-- Indexes for table `attendance_type`
--
ALTER TABLE `attendance_type`
  ADD PRIMARY KEY (`att_typ_Id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`auth_Id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`bg_Id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`pk_board_Id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`cast_Id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`pk_city_id`),
  ADD KEY `foreign key dom id` (`dom_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cls_Id`),
  ADD KEY `class_subfk` (`sub_Id`),
  ADD KEY `class_scsec_fk` (`sc_sec_Id`);

--
-- Indexes for table `class-rep`
--
ALTER TABLE `class-rep`
  ADD PRIMARY KEY (`crep_Id`),
  ADD KEY `std_fk` (`std_Id`);

--
-- Indexes for table `classwise_attendace`
--
ALTER TABLE `classwise_attendace`
  ADD PRIMARY KEY (`cls_att_Id`),
  ADD KEY `classwise_attendace_clsfk` (`cls_Id`),
  ADD KEY `classwise_attendace_subfk` (`sub_Id`),
  ADD KEY `classwise_attendace_atttypefk` (`att_typ_Id`);

--
-- Indexes for table `class_section`
--
ALTER TABLE `class_section`
  ADD PRIMARY KEY (`c_section_Id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desig_Id`);

--
-- Indexes for table `disable`
--
ALTER TABLE `disable`
  ADD PRIMARY KEY (`disable_Id`);

--
-- Indexes for table `discount_type`
--
ALTER TABLE `discount_type`
  ADD PRIMARY KEY (`dis_typ_Id`);

--
-- Indexes for table `domicile`
--
ALTER TABLE `domicile`
  ADD PRIMARY KEY (`dom_Id`);

--
-- Indexes for table `edu_department`
--
ALTER TABLE `edu_department`
  ADD PRIMARY KEY (`pk_reg_Id`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`emer_cnt_Id`),
  ADD KEY `emer_relatoinfk` (`fk_emer_relat_Id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`emp_att_Id`),
  ADD KEY `employee_empfk` (`emp_Id`),
  ADD KEY `employee_attendance_typefk` (`att_typ_Id`);

--
-- Indexes for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD PRIMARY KEY (`emp_cnt_Id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`emp_Id`),
  ADD UNIQUE KEY `emp_Cnic` (`emp_Cnic`),
  ADD UNIQUE KEY `emp_NTN` (`emp_NTN`),
  ADD KEY `employee_info_domfk` (`dom_Id`),
  ADD KEY `employee_info_nationfk` (`nation_Id`),
  ADD KEY `employee_info_subfk` (`sub_Id`),
  ADD KEY `employee_info_castfk` (`cast_Id`),
  ADD KEY `employee_info_bgfk` (`bg_Id`),
  ADD KEY `employee_info_relfk` (`relig_Id`),
  ADD KEY `employee_info_gndfk` (`gnd_Id`),
  ADD KEY `employee_info_disablefk` (`disable_Id`),
  ADD KEY `employee_info_prevfk` (`prev_exper_Id`),
  ADD KEY `employee_info_proffk` (`prof_qual_Id`),
  ADD KEY `employee_info_acdmfk` (`acdm_qual_Id`),
  ADD KEY `employee_info_emptypefk` (`emp_typ_Id`),
  ADD KEY `employee_info_cntfk` (`emp_cnt_Id`),
  ADD KEY `employee_info_emptfk` (`empt_Id`),
  ADD KEY `employee_csecfk` (`c_section_Id`),
  ADD KEY `employee_info_emerfk` (`emer_cnt_Id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`emp_typ_Id`),
  ADD KEY `employee_type_desigfk` (`desig_Id`);

--
-- Indexes for table `employment_info`
--
ALTER TABLE `employment_info`
  ADD PRIMARY KEY (`empt_Id`);

--
-- Indexes for table `entity_type`
--
ALTER TABLE `entity_type`
  ADD PRIMARY KEY (`ent_typ_Id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`exm_Id`),
  ADD UNIQUE KEY `b-univ_Regno` (`b-univ_Regno`),
  ADD KEY `examination_gradefk` (`grade_Id`),
  ADD KEY `examination_exmtypefk` (`exm_typ_Id`),
  ADD KEY `examination_subfk` (`sub_Id`),
  ADD KEY `examination_stdfk` (`std_Id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`exm_typ_Id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`fee_Id`),
  ADD KEY `fee_clsfk` (`cls_Id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fine_Id`),
  ADD KEY `fine_clsfk` (`cls_Id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gnd_Id`);

--
-- Indexes for table `general_entity`
--
ALTER TABLE `general_entity`
  ADD PRIMARY KEY (`gent_Code`),
  ADD KEY `general_entity_suppfk` (`supp_Id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_Id`);

--
-- Indexes for table `last_school`
--
ALTER TABLE `last_school`
  ADD PRIMARY KEY (`lsch_Id`);

--
-- Indexes for table `library_entity`
--
ALTER TABLE `library_entity`
  ADD PRIMARY KEY (`lent_Code`),
  ADD KEY `library_entity_gentfk` (`gent_Code`),
  ADD KEY `library_entity_pubfk` (`pub_Id`),
  ADD KEY `library_entity_authfk` (`auth_Id`),
  ADD KEY `library_entity_editionfk` (`edition_Id`);

--
-- Indexes for table `library_floor`
--
ALTER TABLE `library_floor`
  ADD PRIMARY KEY (`floor_Id`),
  ADD KEY `library_floor_shelffk` (`shelf_Id`);

--
-- Indexes for table `library_info`
--
ALTER TABLE `library_info`
  ADD PRIMARY KEY (`stat_Id`),
  ADD KEY `library_info_floorfk` (`floor_Id`),
  ADD KEY `library_info_lentfk` (`lent_Code`),
  ADD KEY `library_info_categfk` (`stat_categ_Id`),
  ADD KEY `library_info_pubfk` (`pub_Id`),
  ADD KEY `library_info_authfk` (`auth_Id`),
  ADD KEY `library_info_editionfk` (`edition_Id`),
  ADD KEY `library_info_suppfk` (`supp_Id`),
  ADD KEY `library_info_stdfk` (`std_Id`),
  ADD KEY `library_info_empfk` (`emp_Id`);

--
-- Indexes for table `library_rack`
--
ALTER TABLE `library_rack`
  ADD PRIMARY KEY (`rack_Id`);

--
-- Indexes for table `library_shelf`
--
ALTER TABLE `library_shelf`
  ADD PRIMARY KEY (`shelf_Id`),
  ADD KEY `library_shelf_rackfk` (`rack_Id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`pk_marital_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`nation_Id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`occup_Id`);

--
-- Indexes for table `parent_employer`
--
ALTER TABLE `parent_employer`
  ADD PRIMARY KEY (`pnt_empy_Id`);

--
-- Indexes for table `parent_info`
--
ALTER TABLE `parent_info`
  ADD PRIMARY KEY (`pnt_Id`),
  ADD UNIQUE KEY `pnt_Cnic` (`pnt_Cnic`),
  ADD KEY `parent_info_stdfk` (`std_Id`),
  ADD KEY `parent_info_gndfk` (`gnd_Id`),
  ADD KEY `parent_info_occupfk` (`occup_Id`),
  ADD KEY `parent_info_empyfk` (`pnt_empy_Id`),
  ADD KEY `parent_info_desigfk` (`desig_Id`),
  ADD KEY `parent_info_relatfk` (`fk_relat_Id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`PM_Id`);

--
-- Indexes for table `prev_experience`
--
ALTER TABLE `prev_experience`
  ADD PRIMARY KEY (`prev_exper_Id`);

--
-- Indexes for table `professional_qualification`
--
ALTER TABLE `professional_qualification`
  ADD PRIMARY KEY (`prof_qual_Id`),
  ADD KEY `professional_qualification_univfk` (`univ_Id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pub_Id`);

--
-- Indexes for table `purchase_account`
--
ALTER TABLE `purchase_account`
  ADD PRIMARY KEY (`purch_Id`),
  ADD KEY `purchase_enttypfk` (`ent_typ_Id`),
  ADD KEY `purchase_gentfk` (`gent_Code`),
  ADD KEY `purchase_lentfk` (`lent_Code`),
  ADD KEY `purchase_PMfk` (`PM_Id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`pk_relat_Id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`relig_Id`);

--
-- Indexes for table `salary_account`
--
ALTER TABLE `salary_account`
  ADD PRIMARY KEY (`sal_Id`),
  ADD KEY `salary_account_empfk` (`emp_Id`),
  ADD KEY `salary_account_PMfk` (`PM_Id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`pk_school_Id`),
  ADD KEY `board_fk` (`board_Id`);

--
-- Indexes for table `school_section`
--
ALTER TABLE `school_section`
  ADD PRIMARY KEY (`sc_sec_Id`);

--
-- Indexes for table `stationary_category`
--
ALTER TABLE `stationary_category`
  ADD PRIMARY KEY (`stat_categ_Id`);

--
-- Indexes for table `stationary_edition`
--
ALTER TABLE `stationary_edition`
  ADD PRIMARY KEY (`edition_Id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`std_acc_Id`),
  ADD KEY `student_account_distypefk` (`dis_typ_Id`),
  ADD KEY `student_account_feefk` (`fee_Id`),
  ADD KEY `student_account_stdfk` (`std_Id`),
  ADD KEY `student_account_finefk` (`fine_Id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`std_att_Id`),
  ADD KEY `student_attendance_typefk` (`att_typ_Id`),
  ADD KEY `student_stdfk` (`std_Id`),
  ADD KEY `student_clsattfk` (`cls_att_Id`);

--
-- Indexes for table `student_category`
--
ALTER TABLE `student_category`
  ADD PRIMARY KEY (`std_cat_Id`);

--
-- Indexes for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD PRIMARY KEY (`pnt_cnt_Id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`std_Id`),
  ADD KEY `student_info_catfk` (`std_cat_Id`),
  ADD KEY `student_info_castfk` (`cast_Id`),
  ADD KEY `student_info_bgfk` (`bg_Id`),
  ADD KEY `student_info_relfk` (`relig_Id`),
  ADD KEY `student_info_nationfk` (`nation_Id`),
  ADD KEY `student_info_gndfk` (`gnd_Id`),
  ADD KEY `student_info_domfk` (`dom_Id`),
  ADD KEY `student_info_disablefk` (`disable_Id`),
  ADD KEY `student_info_emerfk` (`emer_cnt_Id`),
  ADD KEY `student_info_admfk` (`adm_No`),
  ADD KEY `student_info_clsfk` (`cls_Id`),
  ADD KEY `student_info_lschfk` (`lsch_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_Id`);

--
-- Indexes for table `university_list`
--
ALTER TABLE `university_list`
  ADD PRIMARY KEY (`univ_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdrawl_student`
--
ALTER TABLE `withdrawl_student`
  ADD PRIMARY KEY (`with_Id`),
  ADD KEY `withdrawl_student_stdfk` (`std_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  MODIFY `acdm_qual_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Academic Qualification''s ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `adm_No` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Admission number of student';

--
-- AUTO_INCREMENT for table `attendance_type`
--
ALTER TABLE `attendance_type`
  MODIFY `att_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Attendance type''s ID';

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `auth_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Author ID';

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `bg_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Blood Group ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `pk_board_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Board ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `cast_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Cast ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `pk_city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cls_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Class Id', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classwise_attendace`
--
ALTER TABLE `classwise_attendace`
  MODIFY `cls_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Classwise Attendance ID';

--
-- AUTO_INCREMENT for table `class_section`
--
ALTER TABLE `class_section`
  MODIFY `c_section_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Section ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desig_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Designation ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disable`
--
ALTER TABLE `disable`
  MODIFY `disable_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Disable ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_type`
--
ALTER TABLE `discount_type`
  MODIFY `dis_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Discount Type ID';

--
-- AUTO_INCREMENT for table `domicile`
--
ALTER TABLE `domicile`
  MODIFY `dom_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Domicile ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `edu_department`
--
ALTER TABLE `edu_department`
  MODIFY `pk_reg_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'REgistration Id';

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `emer_cnt_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Student Emergency ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `emp_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Employee Attendance ID';

--
-- AUTO_INCREMENT for table `employee_contact`
--
ALTER TABLE `employee_contact`
  MODIFY `emp_cnt_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Employee contact table Id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `emp_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Employee ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `emp_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Employee type''s ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entity_type`
--
ALTER TABLE `entity_type`
  MODIFY `ent_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Entity Type ID';

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exm_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Exam ID';

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `exm_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Exam Type''s ID';

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fee_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Fee ID';

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gnd_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Gender ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_entity`
--
ALTER TABLE `general_entity`
  MODIFY `gent_Code` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'General Enity Code';

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Grade ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `library_entity`
--
ALTER TABLE `library_entity`
  MODIFY `lent_Code` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Library Entity Code';

--
-- AUTO_INCREMENT for table `library_floor`
--
ALTER TABLE `library_floor`
  MODIFY `floor_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Library Floor ID';

--
-- AUTO_INCREMENT for table `library_info`
--
ALTER TABLE `library_info`
  MODIFY `stat_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Stationary ID';

--
-- AUTO_INCREMENT for table `library_rack`
--
ALTER TABLE `library_rack`
  MODIFY `rack_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Library Shelf Rack ID';

--
-- AUTO_INCREMENT for table `library_shelf`
--
ALTER TABLE `library_shelf`
  MODIFY `shelf_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Library Shelf ID';

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `pk_marital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `nation_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Nationality ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `occup_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Occupation ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parent_info`
--
ALTER TABLE `parent_info`
  MODIFY `pnt_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Parent ID', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `PM_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Payment Mode ID';

--
-- AUTO_INCREMENT for table `prev_experience`
--
ALTER TABLE `prev_experience`
  MODIFY `prev_exper_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Prev Experience ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professional_qualification`
--
ALTER TABLE `professional_qualification`
  MODIFY `prof_qual_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Professional Qualification''s ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pub_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Publisher ID';

--
-- AUTO_INCREMENT for table `purchase_account`
--
ALTER TABLE `purchase_account`
  MODIFY `purch_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Purchase ID';

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `pk_relat_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Relationship ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `relig_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Religion ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary_account`
--
ALTER TABLE `salary_account`
  MODIFY `sal_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Salary ID';

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `pk_school_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'School ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_section`
--
ALTER TABLE `school_section`
  MODIFY `sc_sec_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stationary_category`
--
ALTER TABLE `stationary_category`
  MODIFY `stat_categ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stationary category ID';

--
-- AUTO_INCREMENT for table `stationary_edition`
--
ALTER TABLE `stationary_edition`
  MODIFY `edition_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Book edition ID';

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `std_acc_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Student Account ID';

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `std_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Student Attendance ID';

--
-- AUTO_INCREMENT for table `student_category`
--
ALTER TABLE `student_category`
  MODIFY `std_cat_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Category ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `std_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'This is the student''s ID that will be used in Admission No as well', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Subject''s ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Supplier ID';

--
-- AUTO_INCREMENT for table `university_list`
--
ALTER TABLE `university_list`
  MODIFY `univ_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'University ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdrawl_student`
--
ALTER TABLE `withdrawl_student`
  MODIFY `with_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Withdrawl ID';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  ADD CONSTRAINT `academic_qualification_gradefk` FOREIGN KEY (`grade_Id`) REFERENCES `grade` (`grade_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_qualification_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_qualification_univfk` FOREIGN KEY (`univ_Id`) REFERENCES `university_list` (`univ_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `foreign key dom id` FOREIGN KEY (`dom_id`) REFERENCES `domicile` (`dom_Id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class-rep`
--
ALTER TABLE `class-rep`
  ADD CONSTRAINT `std_fk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_cat_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classwise_attendace`
--
ALTER TABLE `classwise_attendace`
  ADD CONSTRAINT `classwise_attendace_atttypefk` FOREIGN KEY (`att_typ_Id`) REFERENCES `attendance_type` (`att_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classwise_attendace_clsfk` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classwise_attendace_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `emer_relatoinfk` FOREIGN KEY (`fk_emer_relat_Id`) REFERENCES `relationship` (`pk_relat_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD CONSTRAINT `employee_attendance_typefk` FOREIGN KEY (`att_typ_Id`) REFERENCES `attendance_type` (`att_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_empfk` FOREIGN KEY (`emp_Id`) REFERENCES `employee_info` (`emp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD CONSTRAINT `employee_csecfk` FOREIGN KEY (`c_section_Id`) REFERENCES `class_section` (`c_section_Id`),
  ADD CONSTRAINT `employee_info_acdmfk` FOREIGN KEY (`acdm_qual_Id`) REFERENCES `academic_qualification` (`acdm_qual_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_bgfk` FOREIGN KEY (`bg_Id`) REFERENCES `blood_group` (`bg_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_castfk` FOREIGN KEY (`cast_Id`) REFERENCES `cast` (`cast_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_cntfk` FOREIGN KEY (`emp_cnt_Id`) REFERENCES `employee_contact` (`emp_cnt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_disablefk` FOREIGN KEY (`disable_Id`) REFERENCES `disable` (`disable_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_domfk` FOREIGN KEY (`dom_Id`) REFERENCES `domicile` (`dom_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_emerfk` FOREIGN KEY (`emer_cnt_Id`) REFERENCES `emergency_contact` (`emer_cnt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_emptfk` FOREIGN KEY (`empt_Id`) REFERENCES `employment_info` (`empt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_emptypefk` FOREIGN KEY (`emp_typ_Id`) REFERENCES `employee_type` (`emp_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_gndfk` FOREIGN KEY (`gnd_Id`) REFERENCES `gender` (`gnd_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_nationfk` FOREIGN KEY (`nation_Id`) REFERENCES `nationality` (`nation_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_prevfk` FOREIGN KEY (`prev_exper_Id`) REFERENCES `prev_experience` (`prev_exper_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_proffk` FOREIGN KEY (`prof_qual_Id`) REFERENCES `professional_qualification` (`prof_qual_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_religfk` FOREIGN KEY (`relig_Id`) REFERENCES `religion` (`relig_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD CONSTRAINT `employee_type_desigfk` FOREIGN KEY (`desig_Id`) REFERENCES `designation` (`desig_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination`
--
ALTER TABLE `examination`
  ADD CONSTRAINT `examination_exmtypefk` FOREIGN KEY (`exm_typ_Id`) REFERENCES `exam_type` (`exm_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_gradefk` FOREIGN KEY (`grade_Id`) REFERENCES `grade` (`grade_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_clsfk` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fine_clsfk` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_entity`
--
ALTER TABLE `general_entity`
  ADD CONSTRAINT `general_entity_suppfk` FOREIGN KEY (`supp_Id`) REFERENCES `supplier` (`supp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_entity`
--
ALTER TABLE `library_entity`
  ADD CONSTRAINT `library_entity_authfk` FOREIGN KEY (`auth_Id`) REFERENCES `author` (`auth_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_entity_editionfk` FOREIGN KEY (`edition_Id`) REFERENCES `stationary_edition` (`edition_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_entity_gentfk` FOREIGN KEY (`gent_Code`) REFERENCES `general_entity` (`gent_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_entity_pubfk` FOREIGN KEY (`pub_Id`) REFERENCES `publisher` (`pub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_floor`
--
ALTER TABLE `library_floor`
  ADD CONSTRAINT `library_floor_shelffk` FOREIGN KEY (`shelf_Id`) REFERENCES `library_shelf` (`shelf_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_info`
--
ALTER TABLE `library_info`
  ADD CONSTRAINT `library_info_authfk` FOREIGN KEY (`auth_Id`) REFERENCES `author` (`auth_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_categfk` FOREIGN KEY (`stat_categ_Id`) REFERENCES `stationary_category` (`stat_categ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_editionfk` FOREIGN KEY (`edition_Id`) REFERENCES `stationary_edition` (`edition_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_empfk` FOREIGN KEY (`emp_Id`) REFERENCES `employee_info` (`emp_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_floorfk` FOREIGN KEY (`floor_Id`) REFERENCES `library_floor` (`floor_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_lentfk` FOREIGN KEY (`lent_Code`) REFERENCES `library_entity` (`lent_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_pubfk` FOREIGN KEY (`pub_Id`) REFERENCES `publisher` (`pub_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_suppfk` FOREIGN KEY (`supp_Id`) REFERENCES `supplier` (`supp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_shelf`
--
ALTER TABLE `library_shelf`
  ADD CONSTRAINT `library_shelf_rackfk` FOREIGN KEY (`rack_Id`) REFERENCES `library_rack` (`rack_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent_info`
--
ALTER TABLE `parent_info`
  ADD CONSTRAINT `parent_info_desigfk` FOREIGN KEY (`desig_Id`) REFERENCES `designation` (`desig_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_empyfk` FOREIGN KEY (`pnt_empy_Id`) REFERENCES `parent_employer` (`pnt_empy_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_gndfk` FOREIGN KEY (`gnd_Id`) REFERENCES `gender` (`gnd_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_occupfk` FOREIGN KEY (`occup_Id`) REFERENCES `occupation` (`occup_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_relatfk` FOREIGN KEY (`fk_relat_Id`) REFERENCES `relationship` (`pk_relat_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professional_qualification`
--
ALTER TABLE `professional_qualification`
  ADD CONSTRAINT `professional_qualification_univfk` FOREIGN KEY (`univ_Id`) REFERENCES `university_list` (`univ_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_account`
--
ALTER TABLE `purchase_account`
  ADD CONSTRAINT `purchase_PMfk` FOREIGN KEY (`PM_Id`) REFERENCES `payment_mode` (`PM_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_enttypfk` FOREIGN KEY (`ent_typ_Id`) REFERENCES `entity_type` (`ent_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_gentfk` FOREIGN KEY (`gent_Code`) REFERENCES `general_entity` (`gent_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_lentfk` FOREIGN KEY (`lent_Code`) REFERENCES `library_entity` (`lent_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_account`
--
ALTER TABLE `salary_account`
  ADD CONSTRAINT `salary_account_PMfk` FOREIGN KEY (`PM_Id`) REFERENCES `payment_mode` (`PM_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_account_empfk` FOREIGN KEY (`emp_Id`) REFERENCES `employee_info` (`emp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `board_fk` FOREIGN KEY (`board_Id`) REFERENCES `boards` (`pk_board_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_account`
--
ALTER TABLE `student_account`
  ADD CONSTRAINT `student_account_distypefk` FOREIGN KEY (`dis_typ_Id`) REFERENCES `discount_type` (`dis_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_account_feefk` FOREIGN KEY (`fee_Id`) REFERENCES `fee` (`fee_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_account_finefk` FOREIGN KEY (`fine_Id`) REFERENCES `fine` (`fine_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_account_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_typefk` FOREIGN KEY (`att_typ_Id`) REFERENCES `attendance_type` (`att_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_clsattfk` FOREIGN KEY (`cls_att_Id`) REFERENCES `classwise_attendace` (`cls_att_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `student_info_admfk` FOREIGN KEY (`adm_No`) REFERENCES `admission` (`adm_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_bgfk` FOREIGN KEY (`bg_Id`) REFERENCES `blood_group` (`bg_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_castfk` FOREIGN KEY (`cast_Id`) REFERENCES `cast` (`cast_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_catfk` FOREIGN KEY (`std_cat_Id`) REFERENCES `student_category` (`std_cat_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_clsfk` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_disablefk` FOREIGN KEY (`disable_Id`) REFERENCES `disable` (`disable_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_domfk` FOREIGN KEY (`dom_Id`) REFERENCES `domicile` (`dom_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_emerfk` FOREIGN KEY (`emer_cnt_Id`) REFERENCES `emergency_contact` (`emer_cnt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_gndfk` FOREIGN KEY (`gnd_Id`) REFERENCES `gender` (`gnd_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_lschfk` FOREIGN KEY (`lsch_Id`) REFERENCES `last_school` (`lsch_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_nationfk` FOREIGN KEY (`nation_Id`) REFERENCES `nationality` (`nation_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_info_religfk` FOREIGN KEY (`relig_Id`) REFERENCES `religion` (`relig_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_type`
--
ALTER TABLE `user_type`
  ADD CONSTRAINT `user_rolefk` FOREIGN KEY (`user_role_Id`) REFERENCES `user_role_id` (`user_role_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdrawl_student`
--
ALTER TABLE `withdrawl_student`
  ADD CONSTRAINT `withdrawl_student_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

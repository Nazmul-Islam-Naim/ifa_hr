-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2022 at 05:03 PM
-- Server version: 10.3.37-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techjetit_hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `branch_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ddd', 1, '2022-01-09 04:57:10', '2022-01-09 04:57:10'),
(2, 1, 'sving', 1, '2022-01-26 07:06:32', '2022-01-26 07:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `account_name` varchar(191) DEFAULT NULL,
  `account_no` varchar(191) DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `bank_branch` varchar(191) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  `opening_date` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL COMMENT 'User Id',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `branch_id`, `bank_name`, `account_name`, `account_no`, `account_type`, `bank_branch`, `balance`, `opening_date`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cash', 'Cash', 'Cash', 1, 'utt', '98450.00', '2022-01-26', 1, 1, '2022-01-26 07:06:49', '2022-01-26 07:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_book`
--

CREATE TABLE `cheque_book` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL COMMENT 'Bank Id',
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_no`
--

CREATE TABLE `cheque_no` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `cheque_book` int(11) DEFAULT NULL,
  `cheque_no` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Used',
  `tok` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Bangladeshi Taka.', 'BDT', '৳', '2021-12-23 11:06:59', '2021-12-23 05:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Academics', 1, '2022-01-09 04:57:10', '2022-08-30 03:35:55'),
(2, 'Library', 1, '2022-01-26 07:06:32', '2022-01-26 07:06:32'),
(3, 'Finance', 1, '2022-01-31 10:06:13', NULL),
(4, 'Publications', 1, '2022-08-30 03:36:27', '2022-09-07 06:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Accountants', 1, '2022-01-09 04:57:10', '2022-08-30 03:56:04'),
(2, 'Receptionist', 1, '2022-01-26 07:06:32', '2022-01-26 07:06:32'),
(3, 'Technical Head', 1, '2022-01-31 10:06:13', NULL),
(4, 'Admin', 1, '2022-08-30 03:56:19', '2022-08-30 03:56:19'),
(5, 'Director', 1, '2022-08-30 03:59:35', '2022-09-07 06:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Barishal', 1, '2022-08-30 05:47:09', '2022-08-30 05:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `system_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `joining_date` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `basic_salary` decimal(15,2) DEFAULT NULL,
  `employee_image` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `in_time` varchar(191) DEFAULT NULL,
  `out_time` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`id`, `employee_id`, `date`, `in_time`, `out_time`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-02-02', '09:00', '09:00', 0, 1, '2022-02-02 07:19:17', '2022-02-02 07:19:17'),
(2, 14, '2022-02-02', '09:00', '09:00', 0, 1, '2022-02-02 07:19:17', '2022-02-02 07:19:17'),
(6, 14, '2022-02-03', '09:00', '09:00', 0, 1, '2022-02-02 07:22:03', '2022-02-02 07:22:03'),
(5, 2, '2022-02-03', '09:00', '09:00', 0, 1, '2022-02-02 07:22:03', '2022-02-02 07:22:03'),
(7, 2, '2022-02-19', '09:00', '09:00', 0, 1, '2022-02-02 07:22:20', '2022-02-02 07:22:20'),
(8, 14, '2022-02-19', '09:00', '09:00', 0, 1, '2022-02-02 07:22:20', '2022-02-02 07:22:20'),
(9, 2, '2022-08-30', '09:02', '09:04', 0, 1, '2022-08-30 00:36:21', '2022-08-30 00:36:21'),
(10, 14, '2022-08-30', '09:00', '09:00', 0, 1, '2022-08-30 00:36:21', '2022-08-30 00:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `employee_ledger`
--

CREATE TABLE `employee_ledger` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `month` varchar(191) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL COMMENT 'salary',
  `tok` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_pension_prls`
--

CREATE TABLE `employee_pension_prls` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `prl_date` date DEFAULT NULL,
  `last_basic_salary` decimal(15,2) NOT NULL DEFAULT 0.00,
  `leave_average_pay` decimal(15,2) NOT NULL DEFAULT 0.00,
  `leave_half_pay` decimal(15,2) NOT NULL DEFAULT 0.00,
  `due_provident_fund` decimal(15,2) NOT NULL DEFAULT 0.00,
  `leave_encashment_owed` decimal(15,2) NOT NULL DEFAULT 0.00,
  `amount_gratuity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `audit_objected_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `reason_audit_objections` text DEFAULT NULL,
  `total_amount_owed` decimal(15,2) NOT NULL DEFAULT 0.00,
  `amount_money_payable` decimal(15,2) NOT NULL DEFAULT 0.00,
  `provident_fund` decimal(15,2) NOT NULL DEFAULT 0.00,
  `leave_encashment` decimal(15,2) NOT NULL DEFAULT 0.00,
  `gratuity` decimal(15,2) DEFAULT 0.00,
  `amount_loan_taken` decimal(15,2) DEFAULT 0.00,
  `reason_amount_loan_taken` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_transfers`
--

CREATE TABLE `employee_transfers` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `main_designation_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `present_workstation_id` int(11) DEFAULT NULL,
  `present_workstation_designation_id` int(11) DEFAULT NULL,
  `salary_scale_id` int(11) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT 0.00,
  `house_rent` decimal(10,2) NOT NULL DEFAULT 0.00,
  `transferred_workstation_id` int(11) DEFAULT NULL,
  `transferred_workstation_designation_id` int(11) DEFAULT NULL,
  `present_workstation_joining_date` date DEFAULT NULL,
  `transferred_workstation_date` date DEFAULT NULL,
  `transferred_workstation_joining_date` date DEFAULT NULL,
  `total_taken_leave` int(11) DEFAULT NULL,
  `allowance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_transfers`
--

INSERT INTO `employee_transfers` (`id`, `employee_id`, `main_designation_id`, `district_id`, `present_workstation_id`, `present_workstation_designation_id`, `salary_scale_id`, `salary`, `house_rent`, `transferred_workstation_id`, `transferred_workstation_designation_id`, `present_workstation_joining_date`, `transferred_workstation_date`, `transferred_workstation_joining_date`, `total_taken_leave`, `allowance`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, 1, 3, 1, '25000.00', '1550.00', 1, 5, '2022-09-05', '2022-09-03', '2022-09-03', 0, '0.00', 1, '2022-09-03 02:25:44', '2022-09-03 02:25:44'),
(2, 15, 3, 1, 1, 3, 1, '26500.00', '0.00', 1, 1, '2022-08-30', '2022-09-03', '2022-09-03', 0, '0.00', 1, '2022-09-03 02:39:52', '2022-09-05 00:26:48'),
(3, 2, 5, 1, 1, 5, 1, '25000.00', '0.00', 1, 4, '2022-09-03', '2022-09-08', '2022-09-15', 0, '0.00', 1, '2022-09-03 03:01:41', '2022-09-03 03:01:41'),
(4, 15, 1, 1, 1, 5, 1, '26500.00', '0.00', 1, 4, '2022-09-03', '2022-09-05', '2022-09-05', 0, '0.00', 1, '2022-09-05 00:28:54', '2022-09-05 01:19:02'),
(5, 15, 4, 1, 1, 4, 1, '26500.00', '0.00', 2, 5, '2022-09-05', '2022-09-13', '2022-09-20', 0, '0.00', 1, '2022-09-06 00:25:18', '2022-09-06 00:25:18'),
(6, 2, 1, 1, 1, 4, 1, '0.00', '0.00', 2, 5, '1970-01-01', '1970-01-01', '1970-01-01', 0, '0.00', 1, '2022-09-06 06:34:06', '2022-09-06 06:34:06'),
(7, 2, 4, 1, 1, 4, 1, '0.00', '0.00', 2, 5, '2022-09-05', '2022-09-06', '2022-09-20', 0, '0.00', 1, '2022-09-06 06:36:03', '2022-09-06 06:36:03'),
(8, 2, 1, 1, 2, 5, 1, '0.00', '0.00', 1, 2, '1970-01-01', '2022-09-06', '2022-09-06', 0, '0.00', 1, '2022-09-06 06:43:05', '2022-09-10 06:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee_transfers_applications`
--

CREATE TABLE `employee_transfers_applications` (
  `id` int(11) NOT NULL,
  `transfer_number` varchar(255) DEFAULT NULL,
  `first_paragraph` text DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `main_designation_id` int(11) DEFAULT NULL,
  `present_workstation_designation_id` int(11) DEFAULT NULL,
  `present_workstation_id` int(11) DEFAULT NULL,
  `transferred_workstation_designation_id` int(11) DEFAULT NULL,
  `transferred_workstation_id` int(11) DEFAULT NULL,
  `transferred_workstation_date` date DEFAULT NULL,
  `editordata1` text DEFAULT NULL,
  `editordata2` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_transfers_applications`
--

INSERT INTO `employee_transfers_applications` (`id`, `transfer_number`, `first_paragraph`, `employee_id`, `main_designation_id`, `present_workstation_designation_id`, `present_workstation_id`, `transferred_workstation_designation_id`, `transferred_workstation_id`, `transferred_workstation_date`, `editordata1`, `editordata2`, `status`, `created_at`, `updated_at`) VALUES
(2, '১৬.০১.০০০০.১৯.০০২.২২.১৪৬', 'ইসলামিক মিশনের কার্যক্রম সুষ্ঠুভাবে পরিচালনার স্বার্থে নিম্নোক্ত কর্মকর্তাকে স্ব বেতন ও বেতনস্কেলে তার নামের পার্শ্বে বর্ণিত পদে ও কর্মস্থলে বদলি করা হলো।', 15, 2, 4, 1, 5, 2, '2022-09-13', '<table class=\"table\" style=\"--bs-table-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); width: 975px;\"><tbody><tr style=\"height: 40px;\"><td colspan=\"2\" style=\"box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); white-space: unset;\"><p style=\"line-height: 20.88px;\">০২। বদলিকৃত কর্মকর্তাকে বর্তমান কর্মস্থলের যাবতীয় দেনা-পাওনা পরিশোধ/সমন্বয়পূর্বক ২৫-০৫-২০২২ খ্রি. তারিখের মধ্যে বদলিকৃত কর্মস্থলে যোগদান করার প্রস্তাব করা যেতে পারে। অন্যথায় বর্তমান কর্মস্থল হতে তাতখনিক অবমুক্ত হিসেবে গণ্য হবেন।&nbsp;</p><p style=\"line-height: 20.88px;\">০৩। জনস্বার্থে জারিকৃত এই আদেশ অবিলম্বে কার্যকর হবে।&nbsp;</p></td></tr></tbody></table>', '<p style=\"line-height: 20.88px; color: rgb(111, 116, 121); font-size: 11.6px; white-space: nowrap;\">অবগতি ও প্রয়োজনীয় (প্রযোজ্য ক্ষেত্রে) গ্রহনের জন্য অনুলিপু প্রেরন করা হইলঃ&nbsp;</p><p style=\"line-height: 20.88px; color: rgb(111, 116, 121); font-size: 11.6px; white-space: nowrap;\">১) পরিচালক/প্রকল্প পরিচালক (সকল)</p><p style=\"line-height: 20.88px; color: rgb(111, 116, 121); font-size: 11.6px; white-space: nowrap;\">২) সিনিয়র মেডিকেল অফিসার ইসলামিক মিশন...............................................</p><p style=\"line-height: 20.88px; color: rgb(111, 116, 121); font-size: 11.6px; white-space: nowrap;\">৩) জনাব...........................................................................................................</p><p style=\"line-height: 20.88px; color: rgb(111, 116, 121); font-size: 11.6px; white-space: nowrap;\">৪) মহাপরিচালকের একান্ত সচিব ( মহাপরিচালক মহোদয়ের অবগতির জন্য )।</p>', 1, '2022-09-11 00:17:14', '2022-09-12 00:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `date` varchar(191) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, '2022-02-10', 'Independent Day', 1, '2022-02-02 04:46:29', '2022-02-02 04:52:01'),
(5, '2022-02-14', 'Valentine day', 1, '2022-02-02 04:46:43', '2022-02-02 04:46:43'),
(6, '2022-03-02', 'Siam days', 1, '2022-02-02 06:06:00', '2022-02-02 06:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_payment_sub_type`
--

CREATE TABLE `other_payment_sub_type` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_payment_type`
--

CREATE TABLE `other_payment_type` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_payment_voucher`
--

CREATE TABLE `other_payment_voucher` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `payment_sub_type_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `payment_for` varchar(191) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `payment_date` varchar(191) DEFAULT NULL,
  `issue_by` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `tok` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_receive_sub_type`
--

CREATE TABLE `other_receive_sub_type` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `receive_type_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_receive_type`
--

CREATE TABLE `other_receive_type` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_receive_voucher`
--

CREATE TABLE `other_receive_voucher` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `receive_type_id` int(11) DEFAULT NULL,
  `receive_sub_type_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `receive_from` varchar(191) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `receive_date` varchar(191) DEFAULT NULL,
  `issue_by` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `tok` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requested_leaves`
--

CREATE TABLE `requested_leaves` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `leave_from_date` varchar(255) DEFAULT NULL,
  `leave_to_date` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requested_leaves`
--

INSERT INTO `requested_leaves` (`id`, `employee_id`, `date`, `leave_from_date`, `leave_to_date`, `reason`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 14, '2022-02-01', '2022-02-01', '2022-02-03', 'dkjjhjjkjk', 0, 1, '2022-02-01 06:06:54', '2022-02-01 07:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `salary_scales`
--

CREATE TABLE `salary_scales` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `salary` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_scales`
--

INSERT INTO `salary_scales` (`id`, `name`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, '9 th', '22500.00', 1, '2022-08-30 05:36:33', '2022-08-30 05:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `site_page_title` varchar(255) DEFAULT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `hotel_email` varchar(255) DEFAULT NULL,
  `hotel_phone` varchar(255) DEFAULT NULL,
  `hotel_website` varchar(255) DEFAULT NULL,
  `hotel_address` text DEFAULT NULL,
  `management_fee` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `site_page_title`, `hotel_name`, `hotel_email`, `hotel_phone`, `hotel_website`, `hotel_address`, `management_fee`, `created_at`, `updated_at`) VALUES
(1, 'CodexEco Hotel & Resort', 'CodexEco Hotel & Resort', 'codexeco@gmail.com', '1234567890', 'https://codexeco.com/', 'Colony Road, near Bikash Bharati High School.Jangal Khas.', '10.00', '2021-12-23 05:36:32', '2021-12-23 05:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `id` int(11) NOT NULL,
  `system_name` varchar(191) DEFAULT NULL,
  `system_address` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `setup_date` varchar(191) DEFAULT NULL,
  `builders_name` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `system_name`, `system_address`, `phone_number`, `email`, `setup_date`, `builders_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HR & Payroll', NULL, '0167587696', 'hostel1@gmail.com', '2021-12-12', 'Hostel 1', 1, '2021-12-25 07:53:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theme_setting`
--

CREATE TABLE `theme_setting` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `theme_id` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme_setting`
--

INSERT INTO `theme_setting` (`id`, `user_id`, `theme_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2022-01-10 10:15:48', '2022-08-30 05:54:48'),
(2, 2, 3, '2022-01-10 10:16:02', '2022-01-31 02:45:29'),
(3, 3, 1, '2022-01-10 10:16:10', NULL),
(4, 10, 1, '2022-01-30 11:05:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `reason` varchar(191) DEFAULT NULL COMMENT 'Receive, Payment',
  `amount` decimal(15,2) DEFAULT NULL,
  `tok` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `branch_id`, `date`, `reason`, `amount`, `tok`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-26', 'Payment(Apartment Rent Advance)', '10000.00', '20220126075727', 1, 1, '2022-01-26 01:57:27', '2022-01-26 01:57:27'),
(2, 1, '2022-01-26', 'Receive(Member Bill Paid for Hostel)', '100.00', '20220126010700', 1, 1, '2022-01-26 07:07:00', '2022-01-26 07:07:00'),
(3, 1, '2022-01-26', 'Receive(Member Bill Paid for Hostel)', '50.00', '20220126011211', 1, 1, '2022-01-26 07:12:11', '2022-01-26 07:12:11'),
(4, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '100.00', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(5, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '100.00', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(6, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '100.00', '20220126014434', 1, 1, '2022-01-26 07:44:34', '2022-01-26 07:44:34'),
(7, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '200.00', '20220126014450', 1, 1, '2022-01-26 07:44:50', '2022-01-26 07:44:50'),
(8, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '1200.00', '20220126014527', 1, 1, '2022-01-26 07:45:27', '2022-01-26 07:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `transation_report`
--

CREATE TABLE `transation_report` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL COMMENT 'Bank Id',
  `transaction_date` varchar(191) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT 0.00,
  `reason` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `tok` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` tinyint(2) DEFAULT NULL COMMENT 'User Id',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transation_report`
--

INSERT INTO `transation_report` (`id`, `branch_id`, `bank_id`, `transaction_date`, `amount`, `reason`, `note`, `tok`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-26', '10000.00', 'payment(Apartment Rent Advance)', '', '20220126075727', 1, 1, '2022-01-26 01:57:27', '2022-01-26 01:57:27'),
(2, 1, 1, '2022-01-26', '100000.00', 'Opening Balance', NULL, '20220126010649', 1, 1, '2022-01-26 07:06:49', '2022-01-26 07:06:49'),
(3, 1, 1, '2022-01-26', '100.00', 'receive(Member Bill Paid for Hostel)', '', '20220126010700', 1, 1, '2022-01-26 07:07:00', '2022-01-26 07:07:00'),
(4, 1, 1, '2022-01-26', '50.00', 'receive(Member Bill Paid for Hostel)', '', '20220126011211', 1, 1, '2022-01-26 07:12:11', '2022-01-26 07:12:11'),
(5, 1, 1, '2022-01-26', '100.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(6, 1, 1, '2022-01-26', '100.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(7, 1, 1, '2022-01-26', '100.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014434', 1, 1, '2022-01-26 07:44:35', '2022-01-26 07:44:35'),
(8, 1, 1, '2022-01-26', '200.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014450', 1, 1, '2022-01-26 07:44:50', '2022-01-26 07:44:50'),
(9, 1, 1, '2022-01-26', '1200.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014527', 1, 1, '2022-01-26 07:45:27', '2022-01-26 07:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_hint` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `marital_status` tinyint(1) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `emergency_phone` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `work_experience` text DEFAULT NULL,
  `basic_salary` decimal(15,2) DEFAULT NULL,
  `contract_type` tinyint(1) DEFAULT NULL,
  `work_shift` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `bank_title` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `nid_no` varchar(191) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `user_type` tinyint(2) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `salary_scale_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `workstation_id` int(11) DEFAULT NULL,
  `salary` decimal(15,2) NOT NULL DEFAULT 0.00,
  `system_id` int(11) DEFAULT NULL,
  `total_leave` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL COMMENT '2=>Bed Assigned',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `first_name`, `last_name`, `name`, `email`, `password`, `password_hint`, `father_name`, `mother_name`, `dob`, `gender`, `marital_status`, `phone`, `emergency_phone`, `present_address`, `permanent_address`, `qualification`, `work_experience`, `basic_salary`, `contract_type`, `work_shift`, `location`, `bank_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `nid_no`, `join_date`, `image`, `user_type`, `designation_id`, `department_id`, `salary_scale_id`, `district_id`, `workstation_id`, `salary`, `system_id`, `total_leave`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Admin', 'admin@gmail.com', '$2y$10$58P7gogqP6oE.VVgbsz5F.JUbCAJbsr1XwBSmJ2W7IwQ28tTviOzK', '12345678', NULL, NULL, NULL, NULL, NULL, '01708027394', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20211221074644.jpeg', 1, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 1, NULL, NULL, '2021-12-23 06:03:15'),
(2, 1201, 'ff', 'gh', 'আকাশ খান', 'system1@gmail.com', '$2y$10$58P7gogqP6oE.VVgbsz5F.JUbCAJbsr1XwBSmJ2W7IwQ28tTviOzK', '12345678', 'ddd', 'fggg', '2022-01-31', 1, 1, '01708027394', NULL, NULL, NULL, NULL, NULL, NULL, 1, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-06', NULL, 3, 2, 1, 1, 1, 1, '0.00', 1, 15, 1, NULL, NULL, '2022-09-10 06:27:43'),
(14, 1200, 'Asif', 'Mahmud', 'Asif Mahmud', 'allagentlistbd@gmail.com', NULL, NULL, 'ff', 'ggg', '2022-01-31', 2, 3, '01708027394', '01708027394', 'House 12, Road 13, Hydrabad', 'House 12, Road 13, Hydrabad', 'House 12, Road 13, Hydrabad', 'House 12, Road 13, Hydrabad', '455.00', 2, '7', 'dff', 'y updated', '455', '666', '444 55', '566', NULL, '2022-09-03', NULL, 3, 5, 2, 1, 1, 1, '27500.00', 1, 20, 1, NULL, '2022-01-31 06:32:45', '2022-09-11 06:49:07'),
(15, 789, NULL, NULL, 'Nazmul Islam Naim', 'nazmulislam.bdb@gmail.com', NULL, NULL, NULL, NULL, '2022-08-30', 1, 1, '01756732928', NULL, 'Alaoal Avenue, Sector-6, Uttara, Dhaka-1230', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20', '123310822073028.jpg', 3, 5, 1, 1, 1, 2, '26500.00', 1, NULL, 1, NULL, '2022-08-30 07:04:39', '2022-09-06 00:25:18'),
(16, 7776, NULL, NULL, 'Rony Ahmed', NULL, NULL, NULL, NULL, NULL, '2022-08-31', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-31', '564310822070650.jpg', 3, 4, 2, 1, 1, 1, '1550.00', 1, NULL, 1, NULL, '2022-08-31 00:55:12', '2022-08-31 01:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE `users_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) NOT NULL,
  `user_role` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`id`, `user_type`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2021-06-17 15:58:30', NULL),
(2, 'Admin', NULL, '2021-09-11 12:46:42', NULL),
(3, 'Employee', NULL, '2021-12-25 09:01:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workstations`
--

CREATE TABLE `workstations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workstations`
--

INSERT INTO `workstations` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'agargon dhaka', 1, '2022-08-30 06:08:42', '2022-09-07 06:33:07'),
(2, 'Barishal', 'Barishal Sadar', 1, '2022-09-06 00:24:31', '2022-09-06 00:24:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque_book`
--
ALTER TABLE `cheque_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque_no`
--
ALTER TABLE `cheque_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_ledger`
--
ALTER TABLE `employee_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_pension_prls`
--
ALTER TABLE `employee_pension_prls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_transfers`
--
ALTER TABLE `employee_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_transfers_applications`
--
ALTER TABLE `employee_transfers_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_payment_sub_type`
--
ALTER TABLE `other_payment_sub_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_payment_type`
--
ALTER TABLE `other_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_payment_voucher`
--
ALTER TABLE `other_payment_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_receive_sub_type`
--
ALTER TABLE `other_receive_sub_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_receive_type`
--
ALTER TABLE `other_receive_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_receive_voucher`
--
ALTER TABLE `other_receive_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_leaves`
--
ALTER TABLE `requested_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_scales`
--
ALTER TABLE `salary_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_setting`
--
ALTER TABLE `theme_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transation_report`
--
ALTER TABLE `transation_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workstations`
--
ALTER TABLE `workstations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cheque_book`
--
ALTER TABLE `cheque_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cheque_no`
--
ALTER TABLE `cheque_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_ledger`
--
ALTER TABLE `employee_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_pension_prls`
--
ALTER TABLE `employee_pension_prls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_transfers`
--
ALTER TABLE `employee_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_transfers_applications`
--
ALTER TABLE `employee_transfers_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_payment_sub_type`
--
ALTER TABLE `other_payment_sub_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_payment_type`
--
ALTER TABLE `other_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_payment_voucher`
--
ALTER TABLE `other_payment_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_receive_sub_type`
--
ALTER TABLE `other_receive_sub_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_receive_type`
--
ALTER TABLE `other_receive_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_receive_voucher`
--
ALTER TABLE `other_receive_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requested_leaves`
--
ALTER TABLE `requested_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary_scales`
--
ALTER TABLE `salary_scales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `theme_setting`
--
ALTER TABLE `theme_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transation_report`
--
ALTER TABLE `transation_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workstations`
--
ALTER TABLE `workstations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

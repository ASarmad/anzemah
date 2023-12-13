-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 08:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anzemah_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdate` timestamp NULL DEFAULT '2021-12-31 22:00:00',
  `enddate` timestamp NULL DEFAULT '2022-12-31 22:00:00',
  `targetdate` timestamp NULL DEFAULT '2021-12-31 22:00:00',
  `lastdate` timestamp NULL DEFAULT '2022-12-31 22:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `address`, `phone`, `startdate`, `enddate`, `targetdate`, `lastdate`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Ali', 'maadi', '0123456789', '2021-12-31 22:00:00', '2022-12-31 22:00:00', '2021-12-31 22:00:00', '2022-12-31 22:00:00', NULL, NULL),
(2, 'Ahmed Sarmad', 'maadi', '0123456789', '2021-12-31 22:00:00', '2022-12-31 22:00:00', '2021-12-31 22:00:00', '2022-12-31 22:00:00', NULL, NULL),
(3, 'Basata Tech', '19 Gesh Street,Masr Gdida,Cairo,Egypt.', '00201000900771', '2022-12-31 22:00:00', '2023-12-31 22:00:00', '2024-01-10 22:00:00', '2023-01-12 14:28:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_id`, `comment`, `upload`, `user`, `created_at`, `updated_at`) VALUES
(2, 1, 'this file is not accepted by the adminstration', '7A2M3oS2.jpeg', '7ambola', '2023-09-30 07:03:34', '2023-09-30 07:03:34'),
(4, 1, 'this is a test for test.txt file', 'test.txt', 'Ahmed Ali', '2023-10-08 09:32:41', '2023-10-08 09:32:41'),
(6, 2, 'this is test comment', 'login.html', 'Ahmed Ali', '2023-10-15 05:36:31', '2023-10-15 05:36:31'),
(8, 3, 'test', NULL, 'Basata Tech', '2023-10-25 12:49:25', '2023-10-25 12:49:25'),
(9, 3, 'test', 'anzemah_dashboard (3).sql', 'Ahmed Sarmad', '2023-10-31 20:24:08', '2023-10-31 20:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evidances`
--

CREATE TABLE `evidances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `number` int(11) NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evidances`
--

INSERT INTO `evidances` (`id`, `client_id`, `number`, `topic`, `question`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2342342, 'test', 'this is a test question', 'pending', NULL, NULL),
(2, 1, 2342343, 'test2', 'this is test messgae 2', 'pending', NULL, NULL),
(3, 3, 1, 'Scoping', 'Provide a list of office locations, cloud environments, and data centers that store, process or transmit information covered under this assessment.', 'Pending', NULL, '2023-10-30 14:24:18'),
(4, 3, 2, 'Scoping', 'Provide a list of the applications (third-party and in-house) involved in storing, processing, or transmitting information covered under this certification. Also, confirm if more than one application (covered under this certification and any other) runs on one application server.', 'Not Uploaded', NULL, NULL),
(5, 3, 3, 'Scoping', 'Provide a high-level network diagram of the in-scope environment.', 'Not Uploaded', NULL, NULL),
(6, 3, 4, 'Scoping', 'Provide your asset list. This list includes the software, databases, data storage locations, Sample Sets and other related data elements.', 'Not Uploaded', NULL, NULL),
(7, 3, 5, 'Scoping', 'Provide a list of all your external IP addresses and their function.', 'Not Uploaded', NULL, NULL),
(8, 3, 7, 'Scoping', 'Provide detailed network diagram(s) that cover the following: \r\n - All boundaries of the in - scope environment \r\n - Any network segmentation points which are used to reduce scope of the assessment \r\n - Boundaries between trusted and untrusted networks \r\n - Wireless (if available) and wired networks \r\n - All other connection points applicable to the assessment \r\n Ensure the diagram(s) include enough detail to understand how each communication point functions and is secured clearly. For example, the level of detail may include identifying the types of devices, device interfaces, network technologies, protocols, and security controls applicable to that communication point.', 'Not Uploaded', NULL, NULL),
(9, 3, 8, 'Scoping', 'Provide data flow diagrams that explain storage, processing, and transmission of covered information.', 'Not Uploaded', NULL, '2023-10-25 07:06:10'),
(10, 3, 6, 'Network', 'Provide 3 sample firewall and router change forms or tickets.', 'Not Uploaded', NULL, NULL),
(11, 3, 9, 'Network', 'Provide roles and responsibilities for management of firewall and routers.', 'Not Uploaded', NULL, NULL),
(12, 3, 10, 'Network', 'Provide business justification for the use of all services, protocols, and ports allowed through firewall and router; including documentation of security features implemented for those protocols considered to be insecure.', 'Not Uploaded', NULL, NULL),
(13, 3, 11, 'Network', 'Provide two compliant semiannual firewall and router rule set review reports, along with evidence that the team performing the review has the necessary credentials and knowledge.', 'Not Uploaded', NULL, NULL),
(14, 3, 12, 'Network', 'Provide system generated configuration showing inbound and outbound access list necessary for the covered information and specifically deny all other traffic, for all firewall(s)/router(s) in scope. Please provide the screenshot or system generated configuration of the VLANs/interfaces created on the firewall(s)/ router(s).', 'Not Uploaded', NULL, NULL),
(15, 3, 13, 'Network', 'Provide a written explanation of how a router configuration backup is done and how are the backups secured.', 'Not Uploaded', NULL, NULL),
(16, 3, 14, 'Network', 'For in - scope wireless networks, provide system generated configuration of the firewall(s) showing inbound and outbound access list allowing traffic necessary for business purposes permitting only authorized traffic between wireless and the environment having covered information. ', 'Not Uploaded', NULL, NULL),
(17, 3, 15, 'Network', 'If publicly accessible services, protocols and ports exists, provide specific firewall/router configuration showing DMZ interface(s). For the identified DMZ interface(s), provide access control list(s) which limits the inbound internet traffic to IP addresses within the DMZ.\r\n If there is outbound traffic from the environment containing covered information to the internet, provide specific firewall/router access control list(s) which limits outbound traffic to the internet. For such traffic, provide explicit documented approval.\r\n If covered information is stored, provide specific firewall/router configuration showing that covered information is stored in the internal network zone segregated from DMZ and untrusted network. ', 'Not Uploaded', NULL, NULL),
(18, 3, 16, 'Network', 'Provide screenshot for anti-spoofing access list or similar settings on external firewall and/or router.\r\n Provide the screenshot evidence to highlight how private IP addresses are restricted from disclosures to unauthorized parties.', 'Not Uploaded', NULL, NULL),
(19, 3, 17, 'Network', 'Provide screenshot to show stateful inspection enabled on external firewalls in scope.', 'Not Uploaded', NULL, NULL),
(20, 3, 18, 'Network', 'For a sample selected by the assessor, provide the following (for at least 5 laptops):\r\n - Evidence of a personal firewall installed, actively running, and configured as per the organization\'s specific configuration setting.\r\n - Evidence showing user cannot disable the personal firewall.', 'Not Uploaded', NULL, NULL),
(21, 3, 19, 'Configuration Management', 'If a wireless access point is used, provide a screenshot that shows the following:\n - firmware version is the latest\n - strong encryption is implemented for authentication and transmission\n - vendor defaults (e.g. Users, SNMP, encryption protocols etc.) are changed', 'Not Uploaded', NULL, NULL),
(22, 3, 20, 'Configuration Management', 'Provide the screenshots from the sampled systems to check for the unnecessary default accounts removal or disabling. Provide hardening (secure configuration) documents for all system components identified in the asset inventory.', 'Not Uploaded', NULL, NULL),
(23, 3, 21, 'Configuration Management', 'Provide the screenshots of the services/ ports running on in-scope systems (servers and network components) \r\n OR \r\n Provide configuration scan (i.e., authenticated vulnerability scans) results that evidence the list of ports/services running on in-scope systems (servers and network devices)\r\n OR\r\n In the absence of a configuration scan, you may provide results of running ControlCase scripts on in-scope systems. Also, confirm if more than one server\'s primary functions need different security levels located on the same server.', 'Not Uploaded', NULL, NULL),
(24, 3, 22, 'Configuration Management', 'For insecure services (such as HTTP, FTP, Telnet, specific SSL/TLS versions) provide details on what additional controls have been implemented to mitigate the risk of having that insecure service. ', 'Not Uploaded', NULL, NULL),
(25, 3, 23, 'Configuration Management', 'Provide configuration scan (i.e. authenticated vulnerability scans) results that evidence secure configuration against hardening standards. \r\n OR\r\n In the absence of configuration scan, you may provide other evidence (for eg: list of users, list of running services, patches, password policy, audit logging policy, NTP settings) that clearly outlines secure configuration against hardening standards.', 'Not Uploaded', NULL, NULL),
(26, 3, 24, 'Configuration Management', 'For all system components in scope (servers, network devices, applications, databases, etc.) and POS devices, provide evidence of strong cryptography being implemented (ssh, TLS 1.2 or later, RDP over TLS etc.). In the case of early TLS or SSLv3, please provide the risk mitigation and migration plan.', 'Not Uploaded', NULL, NULL),
(27, 3, 25, 'Data Encryption at rest', 'Provide the following for covered information,\r\n - defined retention period for each component mentioned in the CHD matrix\r\n - process for secure data deletion based on the retention period\r\n - records that evidence process was followed', 'Not Uploaded', NULL, NULL),
(28, 3, 26, 'Data Encryption at rest', 'Provide results that show all the applicable assets searched for card data. These could be a combination of process interviews, manual reviews of logs/transaction files and automated scans as long as they cover PAN, Track, CVV and PIN in all locations within cardholder data environment (CDE) and outside the CDE. \r\n Provide the sample application transaction, error, history, trace logs to check for sensitive authentication data.', 'Not Uploaded', NULL, NULL),
(29, 3, 27, 'Data Encryption at rest', 'Provide the following for all physical media and applications\r\n - All screenshots where cardholder data is displayed\r\n - Business justification where full PAN is displayed', 'Not Uploaded', NULL, NULL),
(30, 3, 28, 'Data Encryption at rest', 'Provide the following for all filesystems, databases and any backup media:\r\n - Details on method (encryption, hashing, truncation, tokenization) being used to protect covered information in storage\r\n - Evidence (screenshots or settings) showing covered information is protected. For encryption method, please share the evidence of it\'s associated key management. Description of the cryptographic architecture that includes:\r\n 1. Details of all algorithms, protocols, and keys used for the protection of cardholder data, including key strength and expiry date\r\n 2. Function of the each key used in the cryptographic architecture.\r\n 3. Inventory of any HSMs and other secure cryptographic devices (SCD) used for key management (to be provided in inventory as part of Q4)', 'Not Uploaded', NULL, NULL),
(31, 3, 29, 'Data Encryption in transit', 'Provide a list of locations where information is transmitted and/or received over open, public networks (i.e. Internet, Wireless network, GSM, GPRS, VSAT technology etc.). For the locations identified, provide evidence of trusted keys/certificates, secure configurations and encryption being used for transmission. Encryption must conform to strong industry standards. Provide the sample transmission logs of the sample transactions which highlight the encrypted data. If a private communication channel is used(such as MPLS, leased line, etc.), please share its configuration to confirm the same.', 'Not Uploaded', NULL, NULL),
(32, 3, 30, 'Data Encryption in transit', 'Provide evidence of encryption being used for transmission of in - scope data over messaging technologies such as email, chat, and SMS. Encryption must confirm to strong industry standards.', 'Not Uploaded', NULL, NULL),
(33, 3, 31, 'Anti-Malware', 'For the selected sample, provide evidence of antivirus software. Provide the following,\r\n - Running in active mode\r\n - Evidence confirming that Antivirus is deployed on the in-scope servers and workstations (individual screenshot or extracted list)\r\n - AV configuration evidence to detect, remove, protect against malicious software\r\n - Antivirus version and \r\n - Signature version. \r\n - Evidence that user cannot disable or alter the antivirus settings', 'Not Uploaded', NULL, NULL),
(34, 3, 32, 'Anti-Malware', 'Provide an Antivirus Server Management Console screenshot that shows the following:\r\n - Signature update frequency\r\n - Periodic scan frequency \r\n - Signature version\r\n - Log generation is enabled and log storage for three months online and further nine months offline', 'Not Uploaded', NULL, NULL),
(35, 3, 33, 'Application Security', 'Provide the evidence of reputable outside sources (e.g. security alerts or threat notifications) to identify new security vulnerabilities. For the identified vulnerabilities, provide the risk ranking process. ', 'Not Uploaded', NULL, NULL),
(36, 3, 34, 'Application Security', 'Please wait until assessor provides you with a sample after Phase I. For the selected sample, provide evidence of,\r\n - Current patch levels\r\n - Deployment of patches promptly', 'Not Uploaded', NULL, NULL),
(37, 3, 35, 'Application Security', 'Provide the secure software development policy/procedure adopted for System Development Life Cycle including the process adopted for developer configuration management, security testing, safeguarding the system during the development activity and custom development activity.', 'Not Uploaded', NULL, NULL),
(38, 3, 37, 'Application Security', 'Show common security vulnerabilities are addressed in coding techniques (for example, the OWASP Guide, SANS CWE Top 25, CERT Secure Coding, etc.) by providing a recent code review report for internal/external application(s) that stores, processes, or transmits protected information.', 'Not Uploaded', NULL, NULL),
(39, 3, 38, 'Application Security', 'Provide evidence showing that Higher environments(i.e. production) and lower environments (such as test/development) are logically separated.', 'Not Uploaded', NULL, NULL),
(40, 3, 40, 'Application Security', 'Provide evidence that outlines:\r\n - the process for generating test data to be used in lower (test/development) environments.\r\n - the process for removing test data and test accounts before moving the system to the higher (production) environment. ', 'Not Uploaded', NULL, NULL),
(41, 3, 41, 'Application Security', 'Provide following types of sample change request within last 12 months:\r\n -2 sample software modification\r\n -2 security patch implementation\r\n -A minimum of one significant system change\r\n Also, ensure following information at minimum is included in the change records:\r\n - Change description and date\r\n - Change approver information\r\n - Change impact information\r\n - Change testing details\r\n - Change back-out plan\r\n For a significant change, show how impacted compliance requirements were checked, including but not limited to:\r\n 1. Network diagram is updated to reflect changes.\r\n 2. Systems are configured per configuration standards, with all default passwords changed and unnecessary services disabled.\r\n 3. Systems are protected with required controlsâ€”e.g., file-integrity monitoring (FIM), antivirus, patches, audit logging.\r\n 4. In-scope data to be protected (e.g. Cardholder data, PII, classified information etc.) is documented and incorporated into data-retention policy and procedures\r\n 5. New systems are included in the quarterly vulnerability scanning process.', 'Not Uploaded', NULL, NULL),
(42, 3, 42, 'Application Security', 'Provide the following from a secure code training perspective,\r\n - Material used for training\r\n - All developers are included in the attendee list', 'Not Uploaded', NULL, NULL),
(43, 3, 43, 'Application Security', '(Optional) Provide evidence that a web application firewall is in place to protect against well known web based vulnerabilities (such as OWASP top 10).', 'Not Uploaded', NULL, NULL),
(44, 3, 44, 'Logical Access', 'Provide the organizational access control policy.', 'Not Uploaded', NULL, NULL),
(45, 3, 45, 'Logical Access', 'For the selected sample, please provide,\r\n - Screenshot of the list of users\r\n - Access permission for those users(user access matrix) \r\n - Business justification for the level of access permission', 'Not Uploaded', NULL, NULL),
(59, 3, 46, 'Logical Access', 'Provide two forms/tickets per platform (one for general user and one for administrative user) from the last six months for,\r\n - User access creation\r\n - User access deletion\r\n - User access modification', 'Not Uploaded', NULL, NULL),
(60, 3, 47, 'Logical Access', 'For the sample provided by the assessor, provide user termination forms/tickets that evidence timely removal of logical and physical access upon termination of an employee or contractor (at least three).', 'Not Uploaded', NULL, NULL),
(61, 3, 48, 'Logical Access', 'Provide procedures that outline the process for monitoring inactive users for 90 days for all platforms in scope. Also, provide reports or screenshots from one sample per platform, showing inactive users for 90 days are either disabled or removed.', 'Not Uploaded', NULL, NULL),
(62, 3, 49, 'Logical Access', 'Provide an inventory of all entities (including vendors & third parties) that provides remote access to your organization and identify remote access methods. For each vendor, please provide:\r\n - Procedure for providing access only when needed\r\n - Access activity monitoring reports', 'Not Uploaded', NULL, NULL),
(63, 3, 50, 'Logical Access', 'For all assets identified in the sample selected by the assessor, provide evidence of logical access account and password features including:\r\n - Account lockout policy\r\n - Account lockout duration\r\n - Session timeout policy\r\n - Password length\r\n - Password complexity\r\n - Password history\r\n - Password expiry', 'Not Uploaded', NULL, NULL),
(64, 3, 51, 'Logical Access', 'For the sample provide evidence that during transmission and storage, encryption is carried out on passwords (for the platform and/or consumer applications). ', 'Not Uploaded', NULL, NULL),
(65, 3, 52, 'Logical Access', 'Provide one sample per platform of recent password reset requests/forms for users. ', 'Not Uploaded', NULL, NULL),
(66, 3, 53, 'Logical Access', 'Provide documented procedures for password change during new user creation or for a password reset for all platforms in scope. For one sample per platform provide the screenshot of the setting which forces the user to change the password after the first logon.', 'Not Uploaded', NULL, NULL),
(67, 3, 54, 'Logical Access', 'Provide the following related to remote access: \r\n - Procedure that outlines the process of granting remote access as well as the description of the multi-factor authentication technology used\r\n - List of internal and external users with remote access', 'Not Uploaded', NULL, NULL),
(68, 3, 55, 'Logical Access', 'This question is applicable only to service providers with remote access to multiple customers.\r\nProvide user list for up to (but not exceeding) 3 customers to prove unique credentials are being used per customer.', 'Not Uploaded', NULL, NULL),
(69, 3, 56, 'Logical Access', 'If other authentication mechanisms are used apart from normal passwords (for example, physical or logical security tokens, smart cards, certificates, etc.) then provide the list of users and that the authentication method assigned to an individual account.', 'Not Uploaded', NULL, NULL),
(70, 3, 57, 'Logical Access', 'For the provided sample provide the output screenshot of current active connections.', 'Not Uploaded', NULL, NULL),
(71, 3, 233, 'Logical Access', 'Provide evidence of two-factor authentication being used for all administrative access to the network zone or to individual assets within the environment storing, processing or transmitting in-scope data. ', 'Not Uploaded', NULL, NULL),
(72, 3, 58, 'Physical Security', 'Provide the following for all physical locations in scope: \r\n - Sample records from physical access control system (such as a badge system) and /or video cameras showing 90 days of retention \r\n - List of users created on access control system (such as a badge system) for administrative access', 'Not Uploaded', NULL, NULL),
(73, 3, 59, 'Physical Security', 'Provide two samples of user access creation and deletion forms/tickets from the last six months that evidence, \r\n - physical access allocation to the sensitive area is authorized and as per individual\'s job function.\r\n - timely removal of physical access upon termination of user', 'Not Uploaded', NULL, NULL),
(74, 3, 60, 'Physical Security', 'Provide sample records or scanned copies of visitor log (for a 90 day period) for the facility /network rooms/data centers that contain:\r\n - The visitor\'s name\r\n - The date and time\r\n - The firm represented, and\r\n - The onsite personnel authorizing physical access.', 'Not Uploaded', NULL, NULL),
(75, 3, 61, 'Physical Security', 'Provide a procedure that outlines the following, \r\n - visitors can be distinguished from onsite personnel (employees)\r\n - visitors are escorted during access to sensitive areas\r\n - visitor badges are returned upon departure', 'Not Uploaded', NULL, NULL),
(76, 3, 62, 'Physical Security', 'This question is applicable only if physical media is used for backups of covered information and stored offsite. Provide the procedure which mentions the controls for physically securing the cardholder data. Provide evidence that a physical security review has been performed on the backup facility.\r\n Provide procedures for the management of all removable media (tapes, USB, hard drives, etc,) in accordance with the classification scheme adopted by the organization. PCI - only applicable if CHD is stored on removable media.', 'Not Uploaded', NULL, NULL),
(77, 3, 63, 'Physical Security', 'This question is applicable only if physical media is used to store covered information. Provide the following, \r\n - Full media inventory\r\n - a sample of 5 inbound and outbound media movement records (including information such as date/time of movement, approver name, delivery method) from last six months.', 'Not Uploaded', NULL, NULL),
(78, 3, 64, 'Physical Security', 'Provide the physical/digital media destruction procedure. And, for the sample selected by the assessor provide media destruction records (from within the last year).', 'Not Uploaded', NULL, NULL),
(79, 3, 65, 'Physical Security', 'Provide up - to - date list of point of sale devices (card - reading devices and terminals) with information that includes:\r\n - Make and model of device.\r\n - Location of the device (for example, the address of the site or facility where the device is located).\r\n - Device serial number or another method of unique identification.\r\n', 'Not Uploaded', NULL, NULL),
(80, 3, 66, 'Physical Security', 'Provide for POS devices, \r\n - Maintaining a list of devices\r\n - documented procedures that outline the process for inspection for tampering.\r\n - the material used for training personnel for inspection.\r\n - records showing that personnel has been trained.\r\n - a sample of 3 records from different retail locations showing the schedule of inspection.', 'Not Uploaded', NULL, NULL),
(81, 3, 67, 'Logging and Monitoring', 'For the sample, provide the audit log policy settings. ', 'Not Uploaded', NULL, NULL),
(82, 3, 68, 'Logging and Monitoring', 'Provide actual event logs for each of the platforms identified in the sample. ', 'Not Uploaded', NULL, NULL),
(83, 3, 69, 'Logging and Monitoring', 'Provide the following NTP evidence:\r\n - Device being used as the central NTP server along with the NTP version number\r\n - Setting/Screenshot showing synchronization between NTP server and external time source\r\n - Access control list for NTP server\r\n - Changes to time settings on critical systems are logged\r\n - For the sample, provide evidence that sample systems receive time information only from designated central time server(s)', 'Not Uploaded', NULL, NULL),
(84, 3, 70, 'Logging and Monitoring', 'Provide evidence of the following on the central Syslog server\r\n - Description of the controls implemented to protect against unauthorized changes to log information and operational problems with logging facilities. This includes a) alterations to message types recorded; b) log files that are edited or deleted; c) event log failures, or overwriting of past events recorded. \r\n - Access list of users with permission type (i.e. read-only/modify) and business justification\r\n - Evidence of archived logs being protected by FIM', 'Not Uploaded', NULL, NULL),
(85, 3, 71, 'Logging and Monitoring', 'Provide \r\n - one daily log review report/email for every sample. \r\n - Evidence of follow-up to the event\r\n - Evidence of log retention for 12 months', 'Not Uploaded', NULL, NULL),
(86, 3, 234, 'Logging and Monitoring', 'Provide the following evidence that the enterprise is monitoring and responding to the failure of critical security components such as firewalls, audit logging, file integrity monitoring etc. \r\n\r\n - An alert showing timely detection and reporting of failures of critical security control systems (e.g. Firewalls, IDS/IPS, FIM, antivirus, physical access controls, logical access controls, audit logging mechanisms, segmentation controls (if used))\r\n\r\n - Provide document that shows processes for responding to failures in security controls which includes at least:\r\n 1. Restoring security functions\r\n 2. Identifying and documenting the duration (date and time start to end) of the security failure\r\n 3. Identifying and documenting cause(s) of failure, including root cause, and documenting remediation required to address root cause\r\n 4. Identifying and addressing any security issues that arose during the failure\r\n 5. Performing a risk assessment to determine whether further actions are required as a result of the security failure\r\n 6. Implementing controls to prevent cause of failure from reoccurring\r\n 7. Resuming monitoring of security controls\r\n\r\n - Provide at least one incident report/record to verify that security control failures are documented to include:\r\n 1. Identification of cause(s) of the failure, including root cause\r\n 2. Duration (date and time start and end) of the security failure\r\n 3. Details of the remediation required to address the root cause', 'Not Uploaded', NULL, NULL),
(87, 3, 72, 'Security Testing', 'Provide quarterly wireless analyzer reports along with details for authorized/unauthorized nature of the access point.', 'Not Uploaded', NULL, NULL),
(88, 3, 73, 'Security Testing', 'Provide one sample Incident Response report in response to a rogue access point detection.', 'Not Uploaded', NULL, NULL),
(89, 3, 74, 'Security Testing', 'Provide quarterly internal vulnerability/configuration assessment reports for the last 4 quarters.', 'Not Uploaded', NULL, NULL),
(90, 3, 75, 'Security Testing', 'Provide quarterly external vulnerability/ASV scan reports for the last 4 quarters.', 'Not Uploaded', NULL, NULL),
(91, 3, 76, 'Security Testing', 'Provide a documented methodology being used for penetration testing.', 'Not Uploaded', NULL, NULL),
(92, 3, 77, 'Security Testing', 'Provide external penetration test reports for the network and application layer.', 'Not Uploaded', NULL, NULL),
(93, 3, 78, 'Security Testing', 'Provide internal penetration test reports for network and application layer.', 'Not Uploaded', NULL, NULL),
(94, 3, 79, 'Security Testing', 'Provide results of penetration testing performed on segmentation controls at least every six months and after any changes to segmentation controls/methods.', 'Not Uploaded', NULL, NULL),
(95, 3, 80, 'Security Testing', 'Provide evidence of the following from all IDS/IPS implemented: \r\n - Location on network\r\n - Version number\r\n - Signatures\r\n - Alerting emails\r\n - Follow up to alerts\r\n', 'Not Uploaded', NULL, NULL),
(96, 3, 81, 'Security Testing', 'Provide the following evidence for the sample selected by the assessor: \r\n - FIM version installed\r\n - Files being monitored by FIM\r\n - Alerting emails\r\n - Follow up to alerts\r\n - Critical file comparisons - at least weekly\r\n', 'Not Uploaded', NULL, NULL),
(97, 3, 82, 'HR', 'Provide the high level policy of the management system (Information security policy/business continuity policy/other) and how the policy is distributed to the relevant personnel, vendors and business partners.', 'Not Uploaded', NULL, NULL),
(98, 3, 88, 'HR', 'Provide information security awareness material used for user training and demonstrates an annual recurrence.\r\n Also, provide sample training attendance records covering one year period for:\r\n -New Hires\r\n -Existing employees\r\n -Contractors\r\n', 'Not Uploaded', NULL, NULL),
(99, 3, 89, 'HR', 'For the sample of employees selected by the assessor, provide background check records from the period under assessment (at least 10 employees).', 'Not Uploaded', NULL, NULL),
(100, 3, 83, 'Policies and Procedures', 'Provide all information security policies and procedures. Include evidence of annual review of applicable policies and procedures for consistency with the company\'s risk mitigation plan and company strategy changes. This documentation includes, but is not limited to:\r\n -Information Security Policy\r\n -Access Provisioning, Account Creation, and Termination \r\n -Backup and Recovery\r\n -Breach Notification\r\n -Data Classification \r\n -Data Protection\r\n -Emergency Access\r\n -Emergency Change \r\n -Encryption Standards\r\n -Incident Response and Escalation \r\n -Password Configuration\r\n -Remote Access\r\n -Record Retention, Protection and Disposal Policy\r\n -SDLC and Program Change Management: include documentation, testing, and authorization requirements \r\n -Server / Infrastructure Configuration Standards\r\n -Third Party Engagement \r\n -User Identification and Authentication', 'Not Uploaded', NULL, NULL),
(101, 3, 85, 'Policies and Procedures', 'If remote access to organization\'s network is allowed, provide configuration screenshot for remote access technology (such as Remote VPN) showing session time - out defined after specific period of inactivity.\r\n ', 'Not Uploaded', NULL, NULL),
(102, 3, 86, 'Policies and Procedures', 'Provide a policy which requires the following for:\r\n - prohibit copying, moving, or storing of covered information onto local hard drives and removable electronic media unless a valid business justification exists\r\n - In the case of a business justification, provide evidence that adequate protection exists on target hard drives or electronic media.\r\n', 'Not Uploaded', NULL, NULL),
(103, 3, 87, 'Policies and Procedures', 'Provide an organization chart (or equivalent documentation) which clearly outlines the Information Security roles and responsibility for all personnel. Also, provide following records in support of assigned security responsibilities:\r\n - recent Information Security Policy review/approval record\r\n - Information Security Policy communication to all users\r\n - any security alert email communication to affected parties\r\n\r\n For PCI DSS (where the entity is a Service Provider) and for HITRUST, please provide following:\r\n - Overall accountability for maintaining compliance\r\n - Documented charter for a compliance program and related communication to the executive management\r\n - Documented (Quarterly for PCI DSS or as applicable for other standards/regulations) results of the reviews showing:\r\n    1. Daily log reviews, Firewall rule-set reviews, Applying configuration standards to new systems, responding to security alerts, Change Management process\r\n    2. Sign-off of results by personnel assigned responsibility for maintaining compliance', 'Not Uploaded', NULL, NULL),
(104, 3, 93, 'Policies and Procedures', 'This question applies only to service providers. Provide a sample written acknowledgment that outlines that you are responsible for the security of your customer\'s data.\r\n', 'Not Uploaded', NULL, NULL),
(105, 3, 84, 'Risk Assessment', 'Provide the following information related to Risk Assessment (as applicable):\r\n - The risk assessment methodology /process (definition of risk criteria, risk identification, risk analysis, risk evaluation). \r\n - The results of the assessment carried out (Risk Assessment Report). \r\n - The risk treatment plan (risk treatment options, identification of required controls).\r\n - Evidence of the Information Security Risk Treatment Plan\'s approval and acceptance of the residual information security risks.\r\n - The privacy risk assessment, covering the risk related to the maintenance and processing of PII.\r\n - (ISO27001 and ISO27701 only) The Statement of Applicability', 'Not Uploaded', NULL, NULL),
(106, 3, 90, 'Third Party Management', 'Provide the list of third party service providers as per the following criterion, \r\n - All third party service providers used by an assessed entity to store, process, or transmit covered information on their behalf for business purpose\r\n - All third party service providers used by the assessed entity to manage the components such as routers, firewalls, databases, physical security, and/or servers.\r\n', 'Not Uploaded', NULL, NULL),
(107, 3, 91, 'Third Party Management', 'For all identified in-scope third party service providers and business partners provide following:\r\n - Current service agreement which covers third party\'s security, availability, confidentiality, processing integrity and/or privacy responsibilities for handling covered information\r\n - Current compliance status against applicable regulations / data security standards\r\n - List of security requirements which are managed by each third party service provider on your behalf\r\n - Non-disclosure agreements\r\n', 'Not Uploaded', NULL, NULL),
(108, 3, 92, 'Third Party Management', 'Provide third-party management policy, including how the entity assess and perform due diligence before engaging a third party. \r\n From the sample of third-party selected by the assessor, provide due diligence document/report for contracted third-parties.\r\n', 'Not Uploaded', NULL, NULL),
(109, 3, 94, 'Incident Response', 'Provide the Organization\'s Incident Response Plan/Procedure. The plan should consider:\r\n - Responsible persons for the management of the security incidents.\r\n - The procedure for reporting security events.\r\n - Guidelines are given for employees and contractors to record and report any observed or suspected information security incidents in the systems or services.\r\n - The procedure for evaluating and deciding if events related to information security are classified as incidents.\r\n - The process for responding to information security incidents.\r\n - The guidelines established to use the knowledge gained in the analysis and resolution of information security incidents to reduce the likelihood or impact of future incidents. Also include the mechanisms in place to quantify and monitor the types, volumes, and costs of information security incidents.\r\n - Procedures developed for identifying, collecting, acquiring, and preserving information that can serve as evidence.\r\n - Procedures on escalations/communication to/with external authorities (i.e., Police, Fire, Regulatory agencies) contacted in the event of a security incident. \r\n - Procedures that specify when and who should contact authorities - AND -\r\n - How identified information security incidents should be reported promptly (e.g., if a violation of the law is suspected).\r\n\r\n Also, provide one of the following as evidence to confirm that documented Incident Response procedure was followed:\r\n 1. Annual Incident Response Plan test report OR\r\n 2. From the sample of security incidents selected by the assessor, provide supporting documents', 'Not Uploaded', NULL, NULL),
(110, 3, 95, 'Incident Response', 'Provide Incident handling training records for team with security breach response responsibilities', 'Not Uploaded', NULL, NULL),
(111, 3, 94859485, 'TEST', 'TEST', 'Not Uploaded', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(74, '2014_10_12_000000_create_users_table', 1),
(75, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(76, '2014_10_12_100000_create_password_resets_table', 1),
(77, '2019_08_19_000000_create_failed_jobs_table', 1),
(78, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(79, '2023_04_02_212619_create_clients_table', 1),
(80, '2023_04_05_150007_create_evidances_table', 1),
(81, '2023_08_09_123010_create_uploads_table', 1),
(82, '2023_08_10_205500_create_comments_table', 1),
(83, '2023_08_12_214905_create_contact_us_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evidance_id` int(10) UNSIGNED DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `evidance_id`, `path`, `created_at`, `updated_at`) VALUES
(4, 1, 'test.txt', '2023-10-08 09:32:23', '2023-10-08 09:32:23'),
(5, 1, 'lab2_laravel.sql', '2023-10-08 09:46:29', '2023-10-08 09:46:29'),
(7, 2, 'login.html', '2023-10-15 05:36:05', '2023-10-15 05:36:05'),
(26, 3, 'anzemah_dashboard (3).sql', '2023-10-30 14:24:18', '2023-10-30 14:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `client_id`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Ali', 'a@gmail.com', 1, 'user', NULL, '$2y$10$EcjqDZ1dQlD95ysLg7Xjj.EnMiXjqrcnv3q8P7XqF0/6dGKPDYxrO', NULL, '2023-09-03 10:31:53', '2023-09-03 10:31:53'),
(2, 'Ahmed Sarmad', 'b@gmail.com', 2, 'admin', NULL, '$2y$10$Je.KYmtcZp6EnnHnEU8PzugfMf/Ys29noxzeon3.NkVVdV3722swm', NULL, '2023-09-03 10:35:46', '2023-09-03 10:35:46'),
(3, 'Basata Tech', 'basatatech@anzemah.com', 3, 'user', NULL, '$2y$10$uyX5ZH8RvEGjm7LzpLPy4ekPR6ssGdR/1F49uqGuvq7No1k8DR2V2', NULL, '2023-10-16 08:59:57', '2023-10-16 08:59:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_comment_id_index` (`comment_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_client_id_index` (`client_id`);

--
-- Indexes for table `evidances`
--
ALTER TABLE `evidances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evidances_client_id_index` (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_evidance_id_index` (`evidance_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_client_id_index` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evidances`
--
ALTER TABLE `evidances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

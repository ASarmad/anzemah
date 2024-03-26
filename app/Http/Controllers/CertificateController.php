<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateCreateUpdateRequest;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Evidance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CertificateController extends Controller
{
    /*
    *  --------------------------------------- ADMINSTRATION FUNCTIONS --------------------------------------- *
    */
    /*
    *   The function is to create new certificate in the Certificate tabel.
    */
    public function certificateCreate(CertificateCreateUpdateRequest $request)
    {   
        //  Here to Crate a new Client  //
        $data_list = array(
            array(1, 'Scoping', 'Provide a list of office locations, cloud environments, and data centers that store, process or transmit information covered under this assessment.', 'Not Uploaded','q1.pdf'),
            array(2, 'Scoping', 'Provide a list of the applications (third-party and in-house) involved in storing, processing, or transmitting information covered under this certification. Also, confirm if more than one application (covered under this certification and any other) runs on one application server.', 'Not Uploaded','q2.pdf'),
            array(3, 'Scoping', 'Provide a high-level network diagram of the in-scope environment.', 'Not Uploaded', 'q3.pdf'),
            array(4, 'Scoping', 'Provide your asset list. This list includes the software, databases, data storage locations, Sample Sets and other related data elements.', 'Not Uploaded','q4.pdf'),
            array(5, 'Scoping', 'Provide a list of all your external IP addresses and their function.', 'Not Uploaded', 'q5.pdf'),
            array(7, 'Scoping', 'Provide detailed network diagram(s) that cover the following: \r\n - All boundaries of the in - scope environment \r\n - Any network segmentation points which are used to reduce scope of the assessment \r\n - Boundaries between trusted and untrusted networks \r\n - Wireless (if available) and wired networks \r\n - All other connection points applicable to the assessment \r\n Ensure the diagram(s) include enough detail to understand how each communication point functions and is secured clearly. For example, the level of detail may include identifying the types of devices, device interfaces, network technologies, protocols, and security controls applicable to that communication point.', 'Not Uploaded', 'q7.pdf'),
            array(8, 'Scoping', 'Provide data flow diagrams that explain storage, processing, and transmission of covered information.', 'Not Uploaded', 'q8.pdf'),
            array(6, 'Network', 'Provide 3 sample firewall and router change forms or tickets.', 'Not Uploaded', 'q6.pdf'),
            array(9, 'Network', 'Provide roles and responsibilities for management of firewall and routers.', 'Not Uploaded', 'q9.pdf'),
            array(10, 'Network', 'Provide business justification for the use of all services, protocols, and ports allowed through firewall and router; including documentation of security features implemented for those protocols considered to be insecure.', 'Not Uploaded', 'q10.pdf'),
            array(11, 'Network', 'Provide two compliant semiannual firewall and router rule set review reports, along with evidence that the team performing the review has the necessary credentials and knowledge.', 'Not Uploaded', 'q11.pdf'),
            array(12, 'Network', 'Provide system-generated configuration showing inbound and outbound access list necessary for the covered information and specifically deny all other traffic, for all firewall(s)/router(s) in scope. Please provide the screenshot or system-generated configuration of the VLANs/interfaces created on the firewall(s)/router(s).', 'Not Uploaded', 'q12.pdf'),
            array(13, 'Network', 'Provide a written explanation of how a router configuration backup is done and how are the backups secured.', 'Not Uploaded', 'q13.pdf'),
            array(14, 'Network', 'For in-scope wireless networks, provide system-generated configuration of the firewall(s) showing inbound and outbound access list allowing traffic necessary for business purposes permitting only authorized traffic between wireless and the environment having covered information. ', 'Not Uploaded', 'q14.pdf'),
            array(15, 'Network', 'If publicly accessible services, protocols and ports exist, provide specific firewall/router configuration showing DMZ interface(s). For the identified DMZ interface(s), provide access control list(s) that limit the inbound internet traffic to IP addresses within the DMZ.\r\n If there is outbound traffic from the environment containing covered information to the internet, provide specific firewall/router access control list(s) that limit outbound traffic to the internet. For such traffic, provide explicit documented approval.\r\n If covered information is stored, provide specific firewall/router configuration showing that covered information is stored in the internal network zone segregated from DMZ and untrusted network. ', 'Not Uploaded', 'q15.pdf'),
            array(16, 'Network', 'Provide a screenshot for anti-spoofing access list or similar settings on the external firewall and/or router.\r\n Provide the screenshot evidence to highlight how private IP addresses are restricted from disclosures to unauthorized parties.', 'Not Uploaded','q16.pdf'),
            array(17, 'Network', 'Provide a screenshot to show stateful inspection enabled on external firewalls in scope.', 'Not Uploaded', 'q17.pdf'),
            array(18, 'Network', 'For a sample selected by the assessor, provide the following (for at least 5 laptops):\r\n - Evidence of a personal firewall installed, actively running, and configured as per the organization\'s specific configuration setting.\r\n - Evidence showing the user cannot disable the personal firewall.', 'Not Uploaded', 'q18.pdf'),
            array(19, 'Configuration Management', 'If a wireless access point is used, provide a screenshot that shows the following:\n - firmware version is the latest\n - strong encryption is implemented for authentication and transmission\n - vendor defaults (e.g. Users, SNMP, encryption protocols etc.) are changed', 'Not Uploaded', 'q19.pdf'),
            array(20, 'Configuration Management', 'Provide the screenshots from the sampled systems to check for the unnecessary default accounts removal or disabling. Provide hardening (secure configuration) documents for all system components identified in the asset inventory.', 'Not Uploaded', 'q20.pdf'),
            array(21, 'Configuration Management', 'Provide the screenshots of the services/ ports running on in-scope systems (servers and network components) \r\n OR \r\n Provide configuration scan (i.e., authenticated vulnerability scans) results that evidence the list of ports/services running on in-scope systems (servers and network devices)\r\n OR\r\n In the absence of a configuration scan, you may provide results of running ControlCase scripts on in-scope systems. Also, confirm if more than one server\'s primary functions need different security levels located on the same server.', 'Not Uploaded', 'q21.pdf'),
            array(22, 'Configuration Management', 'For insecure services (such as HTTP, FTP, Telnet, specific SSL/TLS versions) provide details on what additional controls have been implemented to mitigate the risk of having that insecure service. ', 'Not Uploaded', 'q22.pdf'),
            array(23, 'Configuration Management', 'Provide configuration scan (i.e. authenticated vulnerability scans) results that evidence secure configuration against hardening standards. \r\n OR\r\n In the absence of configuration scan, you may provide other evidence (for eg: list of users, list of running services, patches, password policy, audit logging policy, NTP settings) that clearly outlines secure configuration against hardening standards.', 'Not Uploaded', 'q23.pdf'),
            array(24, 'Configuration Management', 'For all system components in scope (servers, network devices, applications, databases, etc.) and POS devices, provide evidence of strong cryptography being implemented (ssh, TLS 1.2 or later, RDP over TLS etc.). In the case of early TLS or SSLv3, please provide the risk mitigation and migration plan.', 'Not Uploaded', 'q24.pdf'),
            array(25, 'Data Encryption at rest', 'Provide the following for covered information,\r\n - defined retention period for each component mentioned in the CHD matrix\r\n - process for secure data deletion based on the retention period\r\n - records that evidence process was followed', 'Not Uploaded', 'q25.pdf'),
            array(26, 'Data Encryption at rest', 'Provide results that show all the applicable assets searched for card data. These could be a combination of process interviews, manual reviews of logs/transaction files and automated scans as long as they cover PAN, Track, CVV and PIN in all locations within cardholder data environment (CDE) and outside the CDE. \r\n Provide the sample application transaction, error, history, trace logs to check for sensitive authentication data.', 'Not Uploaded', 'q26.pdf'),
            array(27, 'Data Encryption at rest', 'Provide the following for all physical media and applications\r\n - All screenshots where cardholder data is displayed\r\n - Business justification where full PAN is displayed', 'Not Uploaded', 'q27.pdf'),
            array(28, 'Data Encryption at rest', 'Provide the following for all filesystems, databases and any backup media:\r\n - Details on method (encryption, hashing, truncation, tokenization) being used to protect covered information in storage\r\n - Evidence (screenshots or settings) showing covered information is protected. For encryption method, please share the evidence of it\'s associated key management. Description of the cryptographic architecture that includes:\r\n 1. Details of all algorithms, protocols, and keys used for the protection of cardholder data, including key strength and expiry date\r\n 2. Function of the each key used in the cryptographic architecture.\r\n 3. Inventory of any HSMs and other secure cryptographic devices (SCD) used for key management (to be provided in inventory as part of Q4)', 'Not Uploaded', 'q28.pdf'),
            array(29, 'Data Encryption in transit', 'Provide a list of locations where information is transmitted and/or received over open, public networks (i.e. Internet, Wireless network, GSM, GPRS, VSAT technology etc.). For the locations identified, provide evidence of trusted keys/certificates, secure configurations and encryption being used for transmission. Encryption must conform to strong industry standards. Provide the sample transmission logs of the sample transactions which highlight the encrypted data. If a private communication channel is used(such as MPLS, leased line, etc.), please share its configuration to confirm the same.', 'Not Uploaded', 'q29.pdf'),
            array(30, 'Data Encryption in transit', 'Provide evidence of encryption being used for transmission of in - scope data over messaging technologies such as email, chat, and SMS. Encryption must confirm to strong industry standards.', 'Not Uploaded', 'q30.pdf'),
            array(31, 'Anti-Malware', 'For the selected sample, provide evidence of antivirus software. Provide the following,\r\n - Running in active mode\r\n - Evidence confirming that Antivirus is deployed on the in-scope servers and workstations (individual screenshot or extracted list)\r\n - AV configuration evidence to detect, remove, protect against malicious software\r\n - Antivirus version and \r\n - Signature version. \r\n - Evidence that user cannot disable or alter the antivirus settings', 'Not Uploaded', 'q31.pdf'),
            array(32, 'Anti-Malware', 'Provide an Antivirus Server Management Console screenshot that shows the following:\r\n - Signature update frequency\r\n - Periodic scan frequency \r\n - Signature version\r\n - Log generation is enabled and log storage for three months online and further nine months offline', 'Not Uploaded', 'q32.pdf'),
            array(33, 'Application Security', 'Provide the evidence of reputable outside sources (e.g. security alerts or threat notifications) to identify new security vulnerabilities. For the identified vulnerabilities, provide the risk ranking process. ', 'Not Uploaded', 'q33.pdf'),
            array(34, 'Application Security', 'Please wait until assessor provides you with a sample after Phase I. For the selected sample, provide evidence of,\r\n - Current patch levels\r\n - Deployment of patches promptly', 'Not Uploaded', 'q34.pdf'),
            array(35, 'Application Security', 'Provide the secure software development policy/procedure adopted for System Development Life Cycle including the process adopted for developer configuration management, security testing, safeguarding the system during the development activity and custom development activity.', 'Not Uploaded', 'q35.pdf'),
            array(36, 'Application Security', 'Show common security vulnerabilities are addressed in coding techniques (for example, the OWASP Guide, SANS CWE Top 25, CERT Secure Coding, etc.) by providing a recent code review report for internal/external application(s) that stores, processes, or transmits protected information.', 'Not Uploaded', 'q36.pdf'),
            array(37, 'Application Security', 'Provide evidence showing that Higher environments(i.e. production) and lower environments (such as test/development) are logically separated.', 'Not Uploaded', 'q37.pdf'),
            array(38, 'Application Security', 'Provide evidence that shows the separation of duties between users having access to higher (production) and lower (test/development) environments.', 'Not Uploaded','q38.pdf'),
            array(39, 'Application Security', 'Provide evidence that outlines:\r\n - the process for generating test data to be used in lower (test/development) environments.\r\n - the process for removing test data and test accounts before moving the system to the higher (production) environment. ', 'Not Uploaded', 'q39.pdf'),
            array(41, 'Application Security', 'Provide following types of sample change request within last 12 months:\r\n -2 sample software modification\r\n -2 security patch implementation\r\n -A minimum of one significant system change\r\n Also, ensure following information at minimum is included in the change records:\r\n - Change description and date\r\n - Change approver information\r\n - Change impact information\r\n - Change testing details\r\n - Change back-out plan\r\n For a significant change, show how impacted compliance requirements were checked, including but not limited to:\r\n 1. Network diagram is updated to reflect changes.\r\n 2. Systems are configured per configuration standards, with all default passwords changed and unnecessary services disabled.\r\n 3. Systems are protected with required controlsâ€”e.g., file-integrity monitoring (FIM), antivirus, patches, audit logging.\r\n 4. In-scope data to be protected (e.g. Cardholder data, PII, classified information etc.) is documented and incorporated into data-retention policy and procedures\r\n 5. New systems are included in the quarterly vulnerability scanning process.', 'Not Uploaded', 'q41.pdf'),
            array(42, 'Application Security', 'Provide the following from a secure code training perspective,\r\n - Material used for training\r\n - All developers are included in the attendee list', 'Not Uploaded', 'q42.pdf'),
            array(43, 'Application Security', '(Optional) Provide evidence that a web application firewall is in place to protect against well known web based vulnerabilities (such as OWASP top 10).', 'Not Uploaded', 'q43.pdf'),
            array(44, 'Logical Access', 'Provide the organizational access control policy.', 'Not Uploaded', 'q44.pdf'),
            array(45, 'Logical Access', 'For the selected sample, please provide,\r\n - Screenshot of the list of users\r\n - Access permission for those users(user access matrix) \r\n - Business justification for the level of access permission', 'Not Uploaded', 'q45.pdf'),
            array(46, 'Logical Access', 'Provide two forms/tickets per platform (one for general user and one for administrative user) from the last six months for,\r\n - User access creation\r\n - User access deletion\r\n - User access modification', 'Not Uploaded', 'q46.pdf'),
            array(47, 'Logical Access', 'For the sample provided by the assessor, provide user termination forms/tickets that evidence timely removal of logical and physical access upon termination of an employee or contractor (at least three).', 'Not Uploaded', 'q47.pdf'),
            array(48, 'Logical Access', 'Provide procedures that outline the process for monitoring inactive users for 90 days for all platforms in scope. Also, provide reports or screenshots from one sample per platform, showing inactive users for 90 days are either disabled or removed.', 'Not Uploaded', 'q48.pdf'),
            array(49, 'Logical Access', 'Provide an inventory of all entities (including vendors & third parties) that provides remote access to your organization and identify remote access methods. For each vendor, please provide:\r\n - Procedure for providing access only when needed\r\n - Access activity monitoring reports', 'Not Uploaded', 'q49.pdf'),
            array(50, 'Logical Access', 'For all assets identified in the sample selected by the assessor, provide evidence of logical access account and password features including:\r\n - Account lockout policy\r\n - Account lockout duration\r\n - Session timeout policy\r\n - Password length\r\n - Password complexity\r\n - Password history\r\n - Password expiry', 'Not Uploaded', 'q50.pdf'),
            array(51, 'Logical Access', 'For the sample provide evidence that during transmission and storage, encryption is carried out on passwords (for the platform and/or consumer applications). ', 'Not Uploaded', 'q51.pdf'),
            array(52, 'Logical Access', 'Provide one sample per platform of recent password reset requests/forms for users. ', 'Not Uploaded', 'q52.pdf'),
            array(53, 'Logical Access', 'Provide documented procedures for password change during new user creation or for a password reset for all platforms in scope. For one sample per platform provide the screenshot of the setting which forces the user to change the password after the first logon.', 'Not Uploaded', 'q53.pdf'),
            array(54, 'Logical Access', 'Provide the following related to remote access: \r\n - Procedure that outlines the process of granting remote access as well as the description of the multi-factor authentication technology used\r\n - List of internal and external users with remote access', 'Not Uploaded', 'q54.pdf'),
            array(55, 'Logical Access', 'This question is applicable only to service providers with remote access to multiple customers.\r\nProvide user list for up to (but not exceeding) 3 customers to prove unique credentials are being used per customer.', 'Not Uploaded', 'q55.pdf'),
            array(56, 'Logical Access', 'If other authentication mechanisms are used apart from normal passwords (for example, physical or logical security tokens, smart cards, certificates, etc.) then provide the list of users and that the authentication method assigned to an individual account.', 'Not Uploaded', 'q56.pdf'),
            array(57, 'Logical Access', 'For the provided sample provide the output screenshot of current active connections.', 'Not Uploaded', 'q57.pdf'),
            array(233, 'Logical Access', 'Provide evidence of two-factor authentication being used for all administrative access to the network zone or to individual assets within the environment storing, processing or transmitting in-scope data. ', 'Not Uploaded', 'q233.pdf'),
            array(58, 'Physical Security', 'Provide the following for all physical locations in scope: \r\n - Sample records from physical access control system (such as a badge system) and /or video cameras showing 90 days of retention \r\n - List of users created on access control system (such as a badge system) for administrative access', 'Not Uploaded', 'q58.pdf'),
            array(59, 'Physical Security', 'Provide two samples of user access creation and deletion forms/tickets from the last six months that evidence, \r\n - physical access allocation to the sensitive area is authorized and as per individual\'s job function.\r\n - timely removal of physical access upon termination of user', 'Not Uploaded', 'q59.pdf'),
            array(60, 'Physical Security', 'Provide sample records or scanned copies of visitor log (for a 90 day period) for the facility /network rooms/data centers that contain:\r\n - The visitor\'s name\r\n - The date and time\r\n - The firm represented, and\r\n - The onsite personnel authorizing physical access.', 'Not Uploaded', 'q60.pdf'),
            array(61, 'Physical Security', 'Provide a procedure that outlines the following, \r\n - visitors can be distinguished from onsite personnel (employees)\r\n - visitors are escorted during access to sensitive areas\r\n - visitor badges are returned upon departure', 'Not Uploaded', 'q61.pdf'),
            array(62, 'Physical Security', 'This question is applicable only if physical media is used for backups of covered information and stored offsite. Provide the procedure which mentions the controls for physically securing the cardholder data. Provide evidence that a physical security review has been performed on the backup facility.\r\n Provide procedures for the management of all removable media (tapes, USB, hard drives, etc,) in accordance with the classification scheme adopted by the organization. PCI - only applicable if CHD is stored on removable media.', 'Not Uploaded', 'q62.pdf'),
            array(63, 'Physical Security', 'This question is applicable only if physical media is used to store covered information. Provide the following, \r\n - Full media inventory\r\n - a sample of 5 inbound and outbound media movement records (including information such as date/time of movement, approver name, delivery method) from last six months.', 'Not Uploaded', 'q63.pdf'),
            array(64, 'Physical Security', 'Provide the physical/digital media destruction procedure. And, for the sample selected by the assessor provide media destruction records (from within the last year).', 'Not Uploaded','q64.pdf'),
            array(65, 'Physical Security', 'Provide up - to - date list of point of sale devices (card - reading devices and terminals) with information that includes:\r\n - Make and model of device.\r\n - Location of the device (for example, the address of the site or facility where the device is located).\r\n - Device serial number or another method of unique identification.\r\n', 'Not Uploaded', 'q65.pdf'),
            array(66, 'Physical Security', 'Provide for POS devices, \r\n - Maintaining a list of devices\r\n - documented procedures that outline the process for inspection for tampering.\r\n - the material used for training personnel for inspection.\r\n - records showing that personnel has been trained.\r\n - a sample of 3 records from different retail locations showing the schedule of inspection.', 'Not Uploaded', 'q66.pdf'),
            array(67, 'Logging and Monitoring', 'For the sample, provide the audit log policy settings. ', 'Not Uploaded', 'q67.pdf'),
            array(68, 'Logging and Monitoring', 'Provide actual event logs for each of the platforms identified in the sample. ', 'Not Uploaded', 'q68.pdf'),
            array(69, 'Logging and Monitoring', 'Provide the following NTP evidence:\r\n - Device being used as the central NTP server along with the NTP version number\r\n - Setting/Screenshot showing synchronization between NTP server and external time source\r\n - Access control list for NTP server\r\n - Changes to time settings on critical systems are logged\r\n - For the sample, provide evidence that sample systems receive time information only from designated central time server(s)', 'Not Uploaded', 'q69.pdf'),
            array(70, 'Logging and Monitoring', 'Provide evidence of the following on the central Syslog server\r\n - Description of the controls implemented to protect against unauthorized changes to log information and operational problems with logging facilities. This includes a) alterations to message types recorded; b) log files that are edited or deleted; c) event log failures, or overwriting of past events recorded. \r\n - Access list of users with permission type (i.e. read-only/modify) and business justification\r\n - Evidence of archived logs being protected by FIM', 'Not Uploaded', 'q70.pdf'),
            array(71, 'Logging and Monitoring', 'Provide \r\n - one daily log review report/email for every sample. \r\n - Evidence of follow-up to the event\r\n - Evidence of log retention for 12 months', 'Not Uploaded', 'q71.pdf'),
            array(234, 'Logging and Monitoring', 'Provide the following evidence that the enterprise is monitoring and responding to the failure of critical security components such as firewalls, audit logging, file integrity monitoring etc. \r\n\r\n - An alert showing timely detection and reporting of failures of critical security control systems (e.g. Firewalls, IDS/IPS, FIM, antivirus, physical access controls, logical access controls, audit logging mechanisms, segmentation controls (if used))\r\n\r\n - Provide document that shows processes for responding to failures in security controls which includes at least:\r\n 1. Restoring security functions\r\n 2. Identifying and documenting the duration (date and time start to end) of the security failure\r\n 3. Identifying and documenting cause(s) of failure, including root cause, and documenting remediation required to address root cause\r\n 4. Identifying and addressing any security issues that arose during the failure\r\n 5. Performing a risk assessment to determine whethe further actions are required as a result of the security failure\r\n 6. Implementing controls to prevent cause of failure from reoccurring\r\n 7. Resuming monitoring of security controls\r\n\r\n - Provide at least one incident report/record to verify that security control failures are documented to include:\r\n 1. Identification of cause(s) of the failure, including root cause\r\n 2. Duration (date and time start and end) of the security failure\r\n 3. Details of the remediation required to address the root cause', 'Not Uploaded', 'q234.pdf'),
            array(72, 'Security Testing', 'Provide quarterly wireless analyzer reports along with details for authorized/unauthorized nature of the access point.', 'Not Uploaded','q72.pdf'),
            array(73, 'Security Testing', 'Provide one sample Incident Response report in response to a rogue access point detection.', 'Not Uploaded', 'q73.pdf'),
            array(74, 'Security Testing', 'Provide quarterly internal vulnerability/configuration assessment reports for the last 4 quarters.', 'Not Uploaded', 'q74.pdf'),
            array(75, 'Security Testing', 'Provide quarterly external vulnerability/ASV scan reports for the last 4 quarters.', 'Not Uploaded', 'q75.pdf'),
            array(76, 'Security Testing', 'Provide a documented methodology being used for penetration testing.', 'Not Uploaded', 'q76.pdf'),
            array(77, 'Security Testing', 'Provide external penetration test reports for the network and application layer.', 'Not Uploaded', 'q77.pdf'),
            array(78, 'Security Testing', 'Provide internal penetration test reports for network and application layer.', 'Not Uploaded', 'q78.pdf'),
            array(79, 'Security Testing', 'Provide results of penetration testing performed on segmentation controls at least every six months and after any changes to segmentation controls/methods.', 'Not Uploaded', 'q79.pdf'),
            array(80, 'Security Testing', 'Provide evidence of the following from all IDS/IPS implemented: \r\n - Location on network\r\n - Version number\r\n - Signatures\r\n - Alerting emails\r\n - Follow up to alerts\r\n', 'Not Uploaded', 'q80.pdf'),
            array(81, 'Security Testing', 'Provide the following evidence for the sample selected by the assessor: \r\n - FIM version installed\r\n - Files being monitored by FIM\r\n - Alerting emails\r\n - Follow up to alerts\r\n - Critical file comparisons - at least weekly\r\n', 'Not Uploaded', 'q81.pdf'),
            array(82, 'HR', 'Provide the high level policy of the management system (Information security policy/business continuity policy/other) and how the policy is distributed to the relevant personnel, vendors and business partners.', 'Not Uploaded', 'q82.pdf'),
            array(88, 'HR', 'Provide information security awareness material used for user training and demonstrates an annual recurrence.\r\n Also, provide sample training attendance records covering one year period for:\r\n -New Hires\r\n -Existing employees\r\n -Contractors\r\n', 'Not Uploaded', 'q88.pdf'),
            array(89, 'HR', 'For the sample of employees selected by the assessor, provide background check records from the period under assessment (at least 10 employees).', 'Not Uploaded', 'q89.pdf'),
            array(83, 'Policies and Procedures', 'Provide all information security policies and procedures. Include evidence of annual review of applicable policies and procedures for consistency with the company\'s risk mitigation plan and company strategy changes. This documentation includes, but is not limited to:\r\n -Information Security Policy\r\n -Access Provisioning, Account Creation, and Termination \r\n -Backup and Recovery\r\n -Breach Notification\r\n -Data Classification \r\n -Data Protection\r\n -Emergency Access\r\n -Emergency Change \r\n -Encryption Standards\r\n -Incident Response and Escalation \r\n -Password Configuration\r\n -Remote Access\r\n -Record Retention, Protection and Disposal Policy\r\n -SDLC and Program Change Management: include documentation, testing, and authorization requirements \r\n -Server / Infrastructure Configuration Standards\r\n -Third Party Engagement \r\n -User Identification and Authentication', 'Not Uploaded', 'q83.pdf'),
            array(85, 'Policies and Procedures', 'If remote access to organization\'s network is allowed, provide configuration screenshot for remote access technology (such as Remote VPN) showing session time - out defined after specific period of inactivity.\r\n ', 'Not Uploaded', 'q85.pdf'),
            array(86, 'Policies and Procedures', 'Provide a policy which requires the following for:\r\n - prohibit copying, moving, or storing of covered information onto local hard drives and removable electronic media unless a valid business justification exists\r\n - In the case of a business justification, provide evidence that adequate protection exists on target hard drives or electronic media.\r\n', 'Not Uploaded', 'q86.pdf'),
            array(87, 'Policies and Procedures', 'Provide an organization chart (or equivalent documentation) which clearly outlines the Information Security roles and responsibility for all personnel. Also, provide following records in support of assigned security responsibilities:\r\n - recent Information Security Policy review/approval record\r\n - Information Security Policy communication to all users\r\n - any security alert email communication to affected parties\r\n\r\n For PCI DSS (where the entity is a Service Provider) and for HITRUST, please provide following:\r\n - Overall accountability for maintaining compliance\r\n - Documented charter for a compliance program and related communication to the executive management\r\n - Documented (Quarterly for PCI DSS or as applicable for other standards/regulations) results of the reviews showing:\r\n    1. Daily log reviews, Firewall rule-set reviews, Applying configuration standards to new systems, responding to security alerts, Change Management process\r\n    2. Sign-off of results by personnel assigned responsibility for maintaining compliance', 'Not Uploaded', 'q87.pdf'),
            array(93, 'Policies and Procedures', 'This question applies only to service providers. Provide a sample written acknowledgment that outlines that you are responsible for the security of your customer\'s data.\r\n', 'Not Uploaded', 'q93.pdf'),
            array(84, 'Risk Assessment', 'Provide the following information related to Risk Assessment (as applicable):\r\n - The risk assessment methodology /process (definition of risk criteria, risk identification, risk analysis, risk evaluation). \r\n - The results of the assessment carried out (Risk Assessment Report). \r\n - The risk treatment plan (risk treatment options, identification of required controls).\r\n - Evidence of the Information Security Risk Treatment Plan\'s approval and acceptance of the residual information security risks.\r\n - The privacy risk assessment, covering the risk related to the maintenance and processing of PII.\r\n - (ISO27001 and ISO27701 only) The Statement of Applicability', 'Not Uploaded', 'q84.pdf'),
            array(90, 'Third Party Management', 'Provide the list of third party service providers as per the following criterion, \r\n - All third party service providers used by an assessed entity to store, process, or transmit covered information on their behalf for business purpose\r\n - All third party service providers used by the assessed entity to manage the components such as routers, firewalls, databases, physical security, and/or servers.\r\n', 'Not Uploaded', 'q90.pdf'),
            array(91, 'Third Party Management', 'For all identified in-scope third party service providers and business partners provide following:\r\n - Current service agreement which covers third party\'s security, availability, confidentiality, processing integrity and/or privacy responsibilities for handling covered information\r\n - Current compliance status against applicable regulations / data security standards\r\n - List of security requirements which are managed by each third party service provider on your behalf\r\n - Non-disclosure agreements\r\n', 'Not Uploaded', 'q91.pdf'),
            array(92, 'Third Party Management', 'Provide third-party management policy, including how the entity assess and perform due diligence before engaging a third party. \r\n From the sample of third-party selected by the assessor, provide due diligence document/report for contracted third-parties.\r\n', 'Not Uploaded', 'q92.pdf'),
            array(94, 'Incident Response', 'Provide the Organization\'s Incident Response Plan/Procedure. The plan should consider:\r\n - Responsible persons for the management of the security incidents.\r\n - The procedure for reporting security events.\r\n - Guidelines are given for employees and contractors to record and report any observed or suspected information security incidents in the systems or services.\r\n - The procedure for evaluating and deciding if events related to information security are classified as incidents.\r\n - The process for responding to information security incidents.\r\n - The guidelines established to use the knowledge gained in the analysis and resolution of information security incidents to reduce the likelihood or impact of future incidents.\r\n - Procedures developed for identifying, collecting, acquiring, and preserving information that can serve as evidence.\r\n - Procedures on escalations/communication to/with external authorities (i.e., Police, Fire, Regulatory agencies) contacted in the event of a security incident. \r\n - Procedures that specify when and who should contact authorities - AND -\r\n - How identified information security incidents should be reported promptly (e.g., if a violation of the law is suspected).\r\n\r\n Also, provide one of the following as evidence to confirm that documented Incident Response procedure was followed:\r\n 1. Annual Incident Response Plan test report OR\r\n 2. From the sample of security incidents selected by the assessor, provide supporting documents', 'Not Uploaded', 'q94.pdf'),
            array(95, 'Incident Response', 'Provide Incident handling training records for team with security breach response responsibilities', 'Not Uploaded', 'q95.pdf')
        );

        try{ 
            $certificate=$request->all();

            $certificate['client_id'] = $request->client;
            $certificate['type'] = $request->type; 
            $certificate['year'] = $request->year;
            $certificate['version'] = $request->version; 
            $certificate['status'] = $request->status; 
            if($request->status=='Valid' OR $request->status=='Expired'){
                $certificate['ref_number'] = $request->ref_number; 
                $certificate['targetdate'] = $request->targetdate; 
                $certificate['lastdate'] = $request->lastdate; 
                if ($request->hasFile('certificate_pdf')) {
                    $file = $request->file('certificate_pdf'); 
                    $pdf = $file->getClientOriginalName(); 
                    $file->move('certificates', $pdf); 
                    $certificate['certificate_pdf'] = $pdf; 
                } 
            }
            $createdCertificate=Certificate::create($certificate);

            if($request->has('auto_evidance')){
                foreach ($data_list as $data) {
                    $createdCertificate->evidances()->create(
                        ['number'=>strval($data[0]),'topic'=>strval($data[1]),'question'=>strval($data[2]),'status'=>strval($data[3]),'refrence'=>strval($data[4])]
                    );
                }
            }

            return response()->json('Data has been added successfully', 200);
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json('Error , please try again later', 400);
        } 
    }

    public function certificateRead()
    {
        $certificate = certificate::with('clients')->get();
        return view('admin.viewCertificate', ['certificate' => $certificate]);
    }

    public function certificateFullRead($id,Request $request)
    {
        $certificate = certificate::findOrFail($id);
        $client = Client::where('id',$certificate->client_id)->first(); 
        $evidance = Evidance::where('certificate_id',$certificate->id)->paginate(10);

        $topics=Evidance::select('topic')->where('certificate_id', $certificate->id)->distinct()->get();
        $pass=Evidance::where('certificate_id',$certificate->id)->where('status','Pass')->count();
        $passcomment=Evidance::where('certificate_id',$certificate->id)->where('status','Pass Comment')->count();

        $diff=Carbon::parse($certificate->targetdate);
        $now=Carbon::now();
        $remining=$diff->diffInDays($now);

        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $topic = $request->get('topic');
            $filter = $request->get('filter');
            if($topic=="reset"){
                $evidance = Evidance::query()
                        ->where('certificate_id',$certificate->id)
                        ->where('question', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate($filter);
            }else{
                $evidance = Evidance::query()
                        ->where('certificate_id',$certificate->id)
                        ->where('topic',$topic)
                        ->where('question', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate($filter);
            }
            return view('admin.layouts.search', compact('evidance','client'))->render();
        }
        return view('admin.viewFullCertificate', ['certificate' => $certificate,'client'=>$client,'evidance'=>$evidance,'topics'=>$topics,'remining'=>$remining,'pass'=>$pass,'passcomment'=>$passcomment]);
    }
    

    public function certificateUpdate(CertificateCreateUpdateRequest $request,$id)
    {
        try{
            $certificate = Certificate::findOrFail($id);
            $certificate->status = $request->status;
            $certificate->type = $request->type;
            $certificate->year = $request->year;
            $certificate->version = $request->version;
            $certificate->ref_number = $request->ref_number;
            $certificate->targetdate = $request->targetdate;
            $certificate->lastdate = $request->lastdate;

            if ($request->hasFile('certificate_pdf')) {
                //TODO: DELETE THE OLD CERTIFICATE PDF IS EXIST
                //File::delete(public_path("certificates/{$oldPDF}"));
                $file = $request->file('certificate_pdf'); 
                $PDF = $file->getClientOriginalName(); 
                $file->move('certificates', $PDF); 
                $certificate->certificate_pdf = $PDF; 
            }
            $certificate->update();

            return response()->json('Data has been Updated successfully', 200);
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json('Error , please try again later', 400);
        }
    }
    
    public function certificateDelete($id)
    {
        try{
            $certificate = Certificate::findOrFail($id);
            $certificate->delete(); 
            return redirect()->back();
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response()->json('Error , please try again later', 400);
        }
    }
}

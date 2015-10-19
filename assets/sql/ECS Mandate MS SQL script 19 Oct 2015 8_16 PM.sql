USE [NBuildDB]
GO
/****** Object:  Table [dbo].[ecs_status]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_status](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[investor_id] [varchar](200) NOT NULL,
	[status] [varchar](200) NOT NULL,
	[remark] [varchar](200) NULL,
	[updated_by] [varchar](50) NOT NULL,
	[date_time] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_schedules]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_schedules](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[investor_id] [varchar](100) NOT NULL,
	[email_id] [varchar](50) NOT NULL,
	[pincode] [int] NOT NULL,
	[location_type] [varchar](30) NULL,
	[address] [varchar](300) NOT NULL,
	[landmark] [varchar](100) NOT NULL,
	[city] [varchar](50) NOT NULL,
	[state] [varchar](50) NOT NULL,
	[date_of_pickup] [varchar](50) NOT NULL,
	[time_of_pickup] [varchar](50) NOT NULL,
	[updated_by] [varchar](50) NOT NULL,
	[date_time] [datetime] NOT NULL,
	[mobileno] [varchar](10) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_schedule_status_history]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_schedule_status_history](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[investor_id] [varchar](100) NOT NULL,
	[email_id] [varchar](50) NOT NULL,
	[pincode] [int] NOT NULL,
	[location_type] [varchar](30) NULL,
	[address] [varchar](300) NOT NULL,
	[landmark] [varchar](100) NOT NULL,
	[city] [varchar](50) NOT NULL,
	[state] [varchar](50) NOT NULL,
	[date_of_pickup] [varchar](50) NOT NULL,
	[time_of_pickup] [varchar](50) NOT NULL,
	[status] [varchar](200) NOT NULL,
	[remark] [varchar](200) NULL,
	[updated_by] [varchar](50) NOT NULL,
	[date_time] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_pincodes]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_pincodes](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[pincode] [int] NOT NULL,
	[city] [varchar](200) NOT NULL,
	[state] [varchar](200) NOT NULL,
	[date_time] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_login_attempts]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_login_attempts](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[ip_address] [varchar](15) NULL,
	[login] [varchar](100) NOT NULL,
	[time] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_investors_old]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_investors_old](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[investor_user_id] [varchar](20) NOT NULL,
	[investor_pan] [varchar](20) NOT NULL,
	[investor_name] [varchar](100) NOT NULL,
	[kyc_status] [varchar](10) NOT NULL,
	[kyc_status_description] [varchar](300) NOT NULL,
	[application_submit_date] [varchar](20) NOT NULL,
	[reg_form_download] [varchar](20) NOT NULL,
	[download_date] [varchar](20) NOT NULL,
	[investor_docs_upload] [varchar](20) NOT NULL,
	[doc_upload_date] [varchar](20) NOT NULL,
	[abcspl_activation_status] [varchar](10) NOT NULL,
	[status_date_abcspl] [varchar](20) NOT NULL,
	[rejection_reason_abcspl] [varchar](300) NOT NULL,
	[cams_kyc] [varchar](10) NOT NULL,
	[status_date_cams] [varchar](20) NOT NULL,
	[rejection_reason_cams] [varchar](300) NOT NULL,
	[karvy_kyc] [varchar](10) NOT NULL,
	[status_date_karvy] [varchar](20) NOT NULL,
	[rejection_reason_karvy] [varchar](300) NOT NULL,
	[franklin_kyc] [varchar](10) NOT NULL,
	[status_date_franklin] [varchar](20) NOT NULL,
	[rejection_reason_franklin] [varchar](300) NOT NULL,
	[sundaram_kyc] [varchar](10) NOT NULL,
	[status_dare_sundaram] [varchar](20) NOT NULL,
	[rejection_reason_sundaram] [varchar](300) NOT NULL,
	[account_status] [varchar](10) NOT NULL,
	[acount_status_date] [varchar](20) NOT NULL,
	[email_alert] [varchar](200) NOT NULL,
	[sms_alert] [varchar](200) NOT NULL,
	[document_received] [varchar](10) NOT NULL,
	[document_received_date] [varchar](20) NOT NULL,
	[rejected_date] [varchar](20) NOT NULL,
	[activation_date] [varchar](20) NOT NULL,
	[courier] [varchar](10) NOT NULL,
	[version_no] [varchar](10) NOT NULL,
	[second_applicant_pan] [varchar](20) NOT NULL,
	[second_applicant_name] [varchar](50) NOT NULL,
	[second_applicant_kyc_status] [varchar](10) NOT NULL,
	[second_applicant_kyc_status_description] [varchar](300) NOT NULL,
	[third_applicant_pan] [varchar](20) NOT NULL,
	[third_applicant_name] [varchar](50) NOT NULL,
	[third_applicant_kyc_status] [varchar](10) NOT NULL,
	[third_applicant_kyc_status_description] [varchar](300) NOT NULL,
	[gender] [varchar](10) NOT NULL,
	[investor_type] [varchar](20) NOT NULL,
	[investor_dob] [varchar](10) NOT NULL,
	[mode_of_holding] [varchar](20) NOT NULL,
	[nationality] [varchar](20) NOT NULL,
	[guardian_pan] [varchar](20) NOT NULL,
	[guardian_name] [varchar](50) NOT NULL,
	[guardian_kyc_status] [varchar](10) NOT NULL,
	[guardian_kyc_status_description] [varchar](300) NOT NULL,
	[guardian_rel_minor] [varchar](300) NOT NULL,
	[bank_name] [varchar](100) NOT NULL,
	[ifsc_code] [varchar](20) NOT NULL,
	[micr_code] [varchar](50) NOT NULL,
	[bank_account_holder_name] [varchar](50) NOT NULL,
	[bank_account_no] [varchar](20) NOT NULL,
	[bank_account_type] [varchar](20) NOT NULL,
	[bank_address] [varchar](300) NOT NULL,
	[applied_for_mandate] [varchar](10) NOT NULL,
	[applied_ecs_ach_both] [varchar](10) NOT NULL,
	[country] [varchar](100) NOT NULL,
	[pincode] [varchar](20) NOT NULL,
	[city] [varchar](100) NOT NULL,
	[state] [varchar](100) NOT NULL,
	[correspondence_address] [varchar](300) NOT NULL,
	[email_id] [varchar](100) NOT NULL,
	[mobile_no] [varchar](20) NOT NULL,
	[nominee_name] [varchar](50) NOT NULL,
	[nominee_rel_first_applicant] [varchar](50) NOT NULL,
	[status] [varchar](20) NOT NULL,
	[nominee_dob] [varchar](20) NOT NULL,
	[nominee_address] [varchar](300) NOT NULL,
	[nominee_guardian_name] [varchar](20) NOT NULL,
	[rel_with_nominee] [varchar](20) NOT NULL,
	[registration_date] [varchar](20) NOT NULL,
	[ecs_mandate_status] [varchar](10) NOT NULL,
	[ach_mandate_status] [varchar](10) NOT NULL,
	[login_username] [varchar](50) NOT NULL,
	[mode_of_application] [varchar](20) NOT NULL,
	[no_of_sip] [int] NOT NULL,
	[no_of_lumsum] [int] NOT NULL,
	[non_kyc_activation_remark] [varchar](300) NOT NULL,
	[myuniverse_ref_id] [varchar](140) NOT NULL,
	[myuniverse_email_id] [varchar](50) NOT NULL,
	[url] [varchar](200) NOT NULL,
	[utm] [varchar](200) NOT NULL,
	[product_page] [varchar](200) NOT NULL,
	[kyc_agency_status] [varchar](10) NOT NULL,
	[date_time] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_investors]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_investors](
	[invuser_id] [varchar](100) NULL,
	[invcode] [numeric](9, 0) NULL,
	[name] [char](50) NULL,
	[panno] [varchar](10) NULL,
	[DOB] [varchar](11) NULL,
	[pincode] [int] NULL,
	[mobileno] [varchar](50) NULL,
	[city] [varchar](50) NULL,
	[accountstatus] [varchar](50) NULL,
	[TPSLtimestamp] [datetime] NULL,
	[tpunique_id] [varchar](50) NULL,
	[remarks] [varchar](50) NULL,
	[userIPAddress] [varchar](50) NULL,
	[Tcid] [varchar](10) NULL,
	[Famoh] [varchar](50) NULL,
	[FAInvType] [varchar](50) NULL,
	[SAName] [varchar](100) NULL,
	[SAPanNo] [varchar](10) NULL,
	[SAInvType] [varchar](50) NULL,
	[TAName] [varchar](100) NULL,
	[TAPanNo] [varchar](50) NULL,
	[GAName] [varchar](50) NULL,
	[GAPanNo] [varchar](10) NULL,
	[nationality] [char](50) NULL,
	[gender] [varchar](50) NULL,
	[invKycStatus] [varchar](10) NULL,
	[invKycStatusDesc] [varchar](50) NULL,
	[secAppKycStatus] [char](10) NULL,
	[secAppKycStatusDesc] [varchar](50) NULL,
	[thirdAppKycStatus] [char](10) NULL,
	[thirdAppKycStatusDesc] [varchar](50) NULL,
	[guardianKycStatus] [char](10) NULL,
	[guardianKycStatusDesc] [varchar](50) NULL,
	[guardianRelWithInv] [varchar](100) NULL,
	[nomName] [char](250) NULL,
	[nomRelWithInv] [varchar](100) NULL,
	[nomStatus] [varchar](50) NULL,
	[nomDateOfBirth] [varchar](50) NULL,
	[nomAddress] [varchar](250) NULL,
	[nomGuardianName] [varchar](250) NULL,
	[nomRelWithGuardian] [varchar](100) NULL,
	[country] [varchar](50) NULL,
	[state] [varchar](50) NULL,
	[correspondenceAddress] [varchar](250) NULL,
	[bankName] [varchar](50) NULL,
	[ifscCode] [varchar](11) NULL,
	[micrCode] [numeric](9, 0) NULL,
	[accHolderName] [varchar](50) NULL,
	[accountNumber] [numeric](18, 0) NULL,
	[accountType] [char](50) NULL,
	[bankAddress] [varchar](250) NULL,
	[offlineMode] [varchar](50) NULL,
	[ecsMandateStatus] [varchar](10) NULL,
	[mandateRegistered] [datetime] NULL,
	[mandateNO] [varchar](50) NULL,
	[achMandateStatus] [varchar](20) NULL,
	[achNo] [varchar](10) NULL,
	[loginUserName] [varchar](100) NULL,
	[modeOfApplication] [varchar](50) NULL,
	[nonKycActivationRemark] [varchar](15) NULL,
	[myUniverseEmailId] [varchar](100) NULL,
	[startDateofregistration] [datetime] NULL,
	[registrationDate] [datetime] NULL,
	[applicationSubmitDate] [datetime] NULL,
	[activationDate] [datetime] NULL,
	[versionNo] [int] NULL,
	[client_timestamp] [datetime] NULL,
	[emailid] [varchar](100) NULL,
	[TAInvType] [varchar](50) NULL,
	[EquityID] [varchar](100) NOT NULL,
	[communication_address] [varchar](255) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_holiday_list]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_holiday_list](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[holiday_date] [varchar](100) NOT NULL,
	[remark] [varchar](200) NULL,
	[inserted_by] [varchar](200) NOT NULL,
	[date_time] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_groups]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_groups](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](20) NOT NULL,
	[description] [varchar](100) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_excel_dump_counts]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ecs_excel_dump_counts](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[dump_date] [date] NOT NULL,
	[upload_count] [int] NOT NULL,
	[download_count] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ecs_download_excel]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_download_excel](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[investor_id] [varchar](200) NOT NULL,
	[download_for_date] [varchar](200) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_courier_pickups]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_courier_pickups](
	[investor_id] [varchar](100) NOT NULL,
	[investor_name] [varchar](100) NOT NULL,
	[address] [varchar](300) NOT NULL,
	[date_of_pickup] [varchar](50) NULL,
	[time_of_pickup] [varchar](50) NULL,
	[status] [varchar](100) NOT NULL,
	[remark] [varchar](300) NULL,
	[date_time] [datetime] NOT NULL,
	[update_date_time] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[investor_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_courier_file_logs_old]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_courier_file_logs_old](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[upload_date] [datetime] NOT NULL,
	[download_date] [datetime] NOT NULL,
	[upload_for_date] [date] NOT NULL,
	[upload_count] [int] NOT NULL,
	[download_count] [int] NOT NULL,
	[excel_file_name] [varchar](100) NULL,
	[download_file_name] [varchar](100) NULL,
	[download_for_date] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_courier_file_logs]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_courier_file_logs](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[upload_date] [datetime] NULL,
	[download_date] [datetime] NULL,
	[upload_for_date] [date] NULL,
	[upload_count] [int] NULL,
	[download_count] [int] NULL,
	[excel_file_name] [varchar](100) NULL,
	[download_file_name] [varchar](100) NULL,
	[download_for_date] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_courier]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_courier](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user_email] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_all_pincodes]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_all_pincodes](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[pincode] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_users_groups]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ecs_users_groups](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NOT NULL,
	[group_id] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
 CONSTRAINT [ecs_uc_users_groups] UNIQUE NONCLUSTERED 
(
	[user_id] ASC,
	[group_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ecs_users]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[ip_address] [varchar](15) NOT NULL,
	[username] [varchar](100) NOT NULL,
	[password] [varchar](255) NOT NULL,
	[salt] [varchar](255) NULL,
	[email] [varchar](100) NOT NULL,
	[activation_code] [varchar](40) NULL,
	[forgotten_password_code] [varchar](40) NULL,
	[forgotten_password_time] [int] NULL,
	[remember_code] [varchar](40) NULL,
	[created_on] [int] NOT NULL,
	[last_login] [int] NULL,
	[active] [int] NULL,
	[first_name] [varchar](50) NULL,
	[last_name] [varchar](50) NULL,
	[company] [varchar](100) NULL,
	[phone] [varchar](20) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_upload_excel]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_upload_excel](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[investor_id] [varchar](100) NOT NULL,
	[upload_for_date] [varchar](200) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_unknown_investors]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_unknown_investors](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[email_id] [varchar](100) NOT NULL,
	[investor_id] [varchar](100) NOT NULL,
	[date_time] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ecs_transactionsreport]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ecs_transactionsreport](
	[transactionId] [int] NOT NULL,
	[investorId] [varchar](50) NOT NULL,
	[InvestorName] [varchar](100) NOT NULL,
	[folioNo] [int] NOT NULL,
	[investor_id1] [varchar](100) NOT NULL,
	[amc_Name] [varchar](100) NOT NULL,
	[amfiSchemeCode] [varchar](20) NOT NULL,
	[scheme_Name] [varchar](100) NOT NULL,
	[transactionAmount] [decimal](18, 4) NOT NULL,
	[transactionQuantity] [decimal](18, 4) NOT NULL,
	[transactionPrice] [decimal](18, 4) NOT NULL,
	[transactionStatus] [varchar](10) NOT NULL,
	[transactionType] [varchar](50) NOT NULL,
	[transaction_Subtype] [varchar](10) NOT NULL,
	[t_cre_time] [datetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Trigger [ecs_status_schedule_history2]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create trigger [dbo].[ecs_status_schedule_history2] on [dbo].[ecs_status]
for update
as
begin
insert into ecs_schedule_status_history (
investor_id, email_id, pincode, location_type, address, landmark, city, state, date_of_pickup, time_of_pickup, status, remark, updated_by, date_time
)
select ecs_schedules.investor_id, ecs_schedules.email_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.date_of_pickup, ecs_schedules.time_of_pickup, 
ecs_status.status, ecs_status.remark, ecs_status.updated_by, ecs_status.date_time
from ecs_schedules inner join ecs_status
on ecs_schedules.investor_id = ecs_status.investor_id
end
GO
/****** Object:  Trigger [ecs_status_schedule_history1]    Script Date: 10/19/2015 20:09:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create trigger [dbo].[ecs_status_schedule_history1] on [dbo].[ecs_schedules]
for update
as
begin
insert into ecs_schedule_status_history (
investor_id, email_id, pincode, location_type, address, landmark, city, state, date_of_pickup, time_of_pickup, status, remark, updated_by, date_time
)
select ecs_schedules.investor_id, ecs_schedules.email_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.date_of_pickup, ecs_schedules.time_of_pickup, 
ecs_status.status, ecs_status.remark, ecs_status.updated_by, ecs_status.date_time
from ecs_schedules inner join ecs_status
on ecs_schedules.investor_id = ecs_status.investor_id
end
GO
/****** Object:  Default [DF__ecs_couri__uploa__43D61337]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT ('0000-00-00 00:00:00') FOR [upload_date]
GO
/****** Object:  Default [DF__ecs_couri__downl__44CA3770]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT ('0000-00-00 00:00:00') FOR [download_date]
GO
/****** Object:  Default [DF__ecs_couri__uploa__45BE5BA9]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT ('0000-00-00') FOR [upload_for_date]
GO
/****** Object:  Default [DF__ecs_couri__uploa__46B27FE2]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT ('0') FOR [upload_count]
GO
/****** Object:  Default [DF__ecs_couri__downl__47A6A41B]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT ('0') FOR [download_count]
GO
/****** Object:  Default [DF__ecs_couri__excel__489AC854]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT (NULL) FOR [excel_file_name]
GO
/****** Object:  Default [DF__ecs_couri__downl__498EEC8D]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT (NULL) FOR [download_file_name]
GO
/****** Object:  Default [DF__ecs_couri__downl__4A8310C6]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_file_logs_old] ADD  DEFAULT ('0000-00-00') FOR [download_for_date]
GO
/****** Object:  Default [DF__ecs_couri__remar__4F47C5E3]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_pickups] ADD  DEFAULT (NULL) FOR [remark]
GO
/****** Object:  Default [DF__ecs_couri__date___503BEA1C]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_pickups] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Default [DF__ecs_couri__updat__51300E55]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_courier_pickups] ADD  DEFAULT (getdate()) FOR [update_date_time]
GO
/****** Object:  Default [DF__ecs_excel__uploa__59C55456]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_excel_dump_counts] ADD  DEFAULT ('0') FOR [upload_count]
GO
/****** Object:  Default [DF__ecs_excel__downl__5AB9788F]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_excel_dump_counts] ADD  DEFAULT ('0') FOR [download_count]
GO
/****** Object:  Default [DF__ecs_holid__remar__5F7E2DAC]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_holiday_list] ADD  DEFAULT (NULL) FOR [remark]
GO
/****** Object:  Default [DF__ecs_holid__date___607251E5]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_holiday_list] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Default [DF__ecs_inves__date___65370702]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_investors_old] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Default [DF__ecs_pinco__date___69FBBC1F]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_pincodes] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Default [DF__ecs_sched__remar__793DFFAF]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_schedule_status_history] ADD  DEFAULT (NULL) FOR [remark]
GO
/****** Object:  Default [DF__ecs_sched__date___7A3223E8]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_schedule_status_history] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Default [DF__ecs_sched__date___6EC0713C]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_schedules] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Default [DF__ecs_statu__remar__73852659]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_status] ADD  DEFAULT (NULL) FOR [remark]
GO
/****** Object:  Default [DF__ecs_statu__date___74794A92]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_status] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Default [DF__ecs_trans__t_cre__41B8C09B]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_transactionsreport] ADD  DEFAULT (getdate()) FOR [t_cre_time]
GO
/****** Object:  Default [DF__ecs_unkno__date___59904A2C]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_unknown_investors] ADD  DEFAULT (getdate()) FOR [date_time]
GO
/****** Object:  Check [ecs_groups_check_id]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_groups]  WITH CHECK ADD  CONSTRAINT [ecs_groups_check_id] CHECK  (([id]>=(0)))
GO
ALTER TABLE [dbo].[ecs_groups] CHECK CONSTRAINT [ecs_groups_check_id]
GO
/****** Object:  Check [ecs_login_attempts_check_id]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_login_attempts]  WITH CHECK ADD  CONSTRAINT [ecs_login_attempts_check_id] CHECK  (([id]>=(0)))
GO
ALTER TABLE [dbo].[ecs_login_attempts] CHECK CONSTRAINT [ecs_login_attempts_check_id]
GO
/****** Object:  Check [ecs_users_check_active]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_users]  WITH CHECK ADD  CONSTRAINT [ecs_users_check_active] CHECK  (([active]>=(0)))
GO
ALTER TABLE [dbo].[ecs_users] CHECK CONSTRAINT [ecs_users_check_active]
GO
/****** Object:  Check [ecs_users_check_id]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_users]  WITH CHECK ADD  CONSTRAINT [ecs_users_check_id] CHECK  (([id]>=(0)))
GO
ALTER TABLE [dbo].[ecs_users] CHECK CONSTRAINT [ecs_users_check_id]
GO
/****** Object:  Check [ecs_users_groups_check_group_id]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_users_groups]  WITH CHECK ADD  CONSTRAINT [ecs_users_groups_check_group_id] CHECK  (([group_id]>=(0)))
GO
ALTER TABLE [dbo].[ecs_users_groups] CHECK CONSTRAINT [ecs_users_groups_check_group_id]
GO
/****** Object:  Check [ecs_users_groups_check_id]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_users_groups]  WITH CHECK ADD  CONSTRAINT [ecs_users_groups_check_id] CHECK  (([id]>=(0)))
GO
ALTER TABLE [dbo].[ecs_users_groups] CHECK CONSTRAINT [ecs_users_groups_check_id]
GO
/****** Object:  Check [ecs_users_groups_check_user_id]    Script Date: 10/19/2015 20:09:53 ******/
ALTER TABLE [dbo].[ecs_users_groups]  WITH CHECK ADD  CONSTRAINT [ecs_users_groups_check_user_id] CHECK  (([user_id]>=(0)))
GO
ALTER TABLE [dbo].[ecs_users_groups] CHECK CONSTRAINT [ecs_users_groups_check_user_id]
GO

create table accounttype
(
    AccountTypeId   int         not null,
    AccountTypeName varchar(16) not null,
    constraint AccountType_AccountTypeId_uindex
        unique (AccountTypeId),
    constraint AccountType_AccountTypeName_uindex
        unique (AccountTypeName)
)
    collate = utf8mb4_unicode_ci;

alter table accounttype
    add primary key (AccountTypeId);

create table account
(
    AccountId      int auto_increment,
    Username       varchar(32)  not null,
    AccTypeId      int          not null,
    FirstName      varchar(64)  not null,
    LastName       varchar(48)  null,
    Email          varchar(128) not null,
    Contact        varchar(11)  not null,
    Birthday       date         not null,
    Gender         char         not null,
    DateRegistered datetime     null,
    constraint Account_AccountId_uindex
        unique (AccountId),
    constraint Account_Contact_uindex
        unique (Contact),
    constraint Account_Email_uindex
        unique (Email),
    constraint Account_Username_uindex
        unique (Username),
    constraint AccTypeId
        foreign key (AccTypeId) references accounttype (AccountTypeId)
)
    collate = utf8mb4_unicode_ci;

alter table account
    add primary key (AccountId);

create table client
(
    ClientId         int auto_increment,
    CliAccountId     int                    not null,
    Weight           float                  null,
    Height           float                  null,
    MbesAttemptCount int        default '0' null,
    MbesAllowAttempt tinyint(1) default '0' null,
    constraint Client_ClientId_uindex
        unique (ClientId),
    constraint CliAccountId
        foreign key (CliAccountId) references account (AccountId)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

alter table client
    add primary key (ClientId);

create table behaviorgraph
(
    GraphId       int auto_increment,
    GraphClientId int          not null,
    Filename      varchar(255) not null,
    StartTime     datetime     null,
    StopTime      datetime     null,
    constraint BehaviorGrap_Filename_uindex
        unique (Filename),
    constraint BehaviorGrap_GraphId_uindex
        unique (GraphId),
    constraint GraphClientId
        foreign key (GraphClientId) references client (ClientId)
);

alter table behaviorgraph
    add primary key (GraphId);

create table consultant
(
    ConsultantId    int auto_increment,
    ConAccountId    int                    not null,
    License         varchar(32)            null,
    ApplicationDate date                   null,
    IsPending       tinyint(1) default '1' null,
    constraint Consultant_ConsultantId_uindex
        unique (ConsultantId),
    constraint ConAccountId
        foreign key (ConAccountId) references account (AccountId)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

alter table consultant
    add primary key (ConsultantId);

create table consultantclient
(
    CcConsultantId int not null,
    CcClientId     int not null,
    primary key (CcConsultantId, CcClientId),
    constraint CcClientId
        foreign key (CcClientId) references client (ClientId),
    constraint CcConsultantId
        foreign key (CcConsultantId) references consultant (ConsultantId)
)
    collate = utf8mb4_unicode_ci;

create table journalentry
(
    JournalEntryId  int auto_increment,
    JournalClientId int      not null,
    Title           tinytext not null,
    Body            text     null,
    DateTimeCreated datetime null,
    ImageFileName   tinytext null,
    constraint JournalEntry_JournalEntryId_uindex
        unique (JournalEntryId),
    constraint JournalClientId
        foreign key (JournalEntryId) references client (ClientId)
);

alter table journalentry
    add primary key (JournalEntryId);

create table mbesresponse
(
    ResponseClientId int not null,
    AttemptId        int not null,
    QuestionId       int not null,
    ScaleValue       int not null,
    constraint MbesResponse_ResponseClientId_AttemptId_QuestionId_uindex
        unique (ResponseClientId, AttemptId, QuestionId),
    constraint ResponseClientId
        foreign key (ResponseClientId) references client (ClientId)
);

create table password
(
    PsAccountId  int         not null
        primary key,
    PasswordHash varchar(64) not null,
    PasswordSalt varchar(32) not null,
    constraint PsAccountId
        foreign key (PsAccountId) references account (AccountId)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table pendingconsultant
(
    PendingConsultantId int      not null
        primary key,
    RegistrationDate    datetime not null,
    constraint ConsultantId
        foreign key (PendingConsultantId) references consultant (ConsultantId)
)
    collate = utf8mb4_unicode_ci;



create schema h5 collate utf8mb4_0900_ai_ci;

create table users
(
    Id int auto_increment,
    UserName varchar(255) not null,
    PassWord varchar(255) not null,
    Authority int(1) default 1 not null comment '0:admin
1:normal user',
    Email varchar(255) null,
    PhoneNr varchar(255) null,
    profile_image int(1) default 0 null,
    constraint users_Id_uindex
        unique (Id)
)
    comment 'add authority';

alter table users
    add primary key (Id);

create table passages
(
    id int auto_increment
        primary key,
    title varchar(255) null,
    content longtext null,
    author_id int null,
    time timestamp default CURRENT_TIMESTAMP null,
    image varchar(255) null comment 'to save the path of the image',
    constraint passages_users_Id_fk
        foreign key (author_id) references users (Id)
);

create table message
(
    id int auto_increment comment 'message id
',
    title varchar(255) null comment 'title of message
',
    content varchar(255) null,
    authorId int null,
    passageId int null,
    created_time timestamp default CURRENT_TIMESTAMP null,
    constraint message_id_uindex
        unique (id),
    constraint message_passages_id_fk
        foreign key (passageId) references passages (id),
    constraint message_users_Id_fk
        foreign key (authorId) references users (Id)
);

alter table message
    add primary key (id);

create table reply
(
    id int auto_increment
        primary key,
    content text null,
    authorId int null,
    messageId int null,
    created_time timestamp default CURRENT_TIMESTAMP null,
    passage_id int null,
    constraint reply_message_id_fk
        foreign key (messageId) references message (id),
    constraint reply_passages_id_fk
        foreign key (passage_id) references passages (id),
    constraint reply_users_Id_fk
        foreign key (authorId) references users (Id)
);


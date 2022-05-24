create table notes
(
    id      int auto_increment
        primary key,
    title   varchar(30)          null,
    article varchar(255)         null,
    created date                 not null,
    deleted tinyint(1) default 0 not null,
    user_id int                  not null
)
    charset = cp1251
    auto_increment = 0;

create table users
(
    id         int auto_increment
        primary key,
    login      varchar(40) not null,
    password   varchar(40) not null,
    privileges varchar(1)  not null,
    email      varchar(40) null
)
    charset = cp1251
    auto_increment = 0;

INSERT INTO `notes` (`id`, `title`, `article`, `created`, `deleted`, `user_id`)
VALUES (1, 1, 1, 1970 - 01 - 01, 0, 1),
       (2, 2, 2, 1970 - 01 - 01, 0, 1),
       (3, 3, 3, 1970 - 01 - 01, 0, 2);

INSERT INTO `users` (`id`, `login`, `password`, `privileges`, `email`)
VALUES (0, 'user_login', 'user_pass', 1, 'user_email'),
       (1, 'admin_login', 'admin_pass', 2, 'admin_email');



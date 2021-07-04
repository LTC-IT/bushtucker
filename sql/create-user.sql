create table IF NOT EXISTS user
(
    user_id     INTEGER not null
        primary key autoincrement,
    username    TEXT,
    password    varchar(255),
    name        TEXT,
    profilePic  TEXT,
    accessLevel INTEGER
);
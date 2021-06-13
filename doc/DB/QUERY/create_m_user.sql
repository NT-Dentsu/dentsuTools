#Rev 1.1 テーブル名の前にDB名を追加
#        user_iconの型をVARCHARからTEXTに変更(全てのカラムの文字数が65535を超えてエラーが発生するため)
#Rev 1.0 新規作成

CREATE TABLE IF NOT EXISTS dentsudb.m_user(
    user_id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    user_name VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    password VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    insert_time DATETIME,
    update_time DATETIME,
    user_icon TEXT CHARACTER SET utf8 COLLATE utf8_bin,
    PRIMARY KEY(
        user_id
    )
)
;

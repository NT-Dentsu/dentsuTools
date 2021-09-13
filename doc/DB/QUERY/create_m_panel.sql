#Rev 1.0 新規作成

CREATE TABLE IF NOT EXISTS dentsudb.m_panel(
    panel_name VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    content_link TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    content_image TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    PRIMARY KEY(
        panel_name
    )
)
;

#Rev 1.1 utf8→utf8mb4に修正
#Rev 1.0 新規作成

CREATE TABLE IF NOT EXISTS dentsudb.m_panel(
    panel_name VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    content_link TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    content_image TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    PRIMARY KEY(
        panel_name
    )
)
;

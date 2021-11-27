# t_user_panel_infoテーブルにプリセットデータをセットするためのクエリ

# t_user_panel_infoテーブルにのみuser_idが/^preset.*$/のレコードがある
# m_userのuser_id名において/^preset.*$/は既に予約されているものとする(入力チェックで弾く)

# preset001の作成
insert into t_user_panel_info values ("preset001", "size M hol", 0, 4);
insert into t_user_panel_info values ("preset001", NULL, 1, NULL);
insert into t_user_panel_info values ("preset001", "size S", 2, 5);
insert into t_user_panel_info values ("preset001", "size M var", 3, 3);
insert into t_user_panel_info values ("preset001", "size L", 4, 2);
insert into t_user_panel_info values ("preset001", NULL, 5, NULL);
insert into t_user_panel_info values ("preset001", "size M var", 6, 3);
insert into t_user_panel_info values ("preset001", NULL, 7, NULL);
insert into t_user_panel_info values ("preset001", NULL, 8, NULL);
insert into t_user_panel_info values ("preset001", NULL, 9, NULL);
insert into t_user_panel_info values ("preset001", NULL, 10, NULL);
insert into t_user_panel_info values ("preset001", "size S", 11, 5);
insert into t_user_panel_info values ("preset001", "size S", 12, 5);
insert into t_user_panel_info values ("preset001", "size M hol", 13, 4);
insert into t_user_panel_info values ("preset001", NULL, 14, NULL);
insert into t_user_panel_info values ("preset001", "size S", 15, 5);

# preset001に使うパネル(m_panel)の作成(絶対パスのほうが良さそう)
insert into m_panel values ("size L", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_L.jpg");
insert into m_panel values ("size M hol", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_M_h.jpg");
insert into m_panel values ("size M var", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_M_v.jpg");
insert into m_panel values ("size S", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_S.jpg");

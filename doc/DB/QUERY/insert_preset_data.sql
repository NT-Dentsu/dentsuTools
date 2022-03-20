# t_user_panel_infoテーブルにプリセットデータをセットするためのクエリ

# t_user_panel_infoテーブルにのみuser_idが/^preset.*$/のレコードがある
# m_userのuser_id名において/^preset.*$/は既に予約されているものとする(入力チェックで弾く)

# presetの作成
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
# preset002の作成
insert into t_user_panel_info values ("preset002", "size S", 0, 5);
insert into t_user_panel_info values ("preset002", "size M hol", 1, 4);
insert into t_user_panel_info values ("preset002", NULL, 2, NULL);
insert into t_user_panel_info values ("preset002", "size S", 3, 5);
insert into t_user_panel_info values ("preset002", "size M var", 4, 3);
insert into t_user_panel_info values ("preset002", "size L", 5, 2);
insert into t_user_panel_info values ("preset002", NULL, 6, NULL);
insert into t_user_panel_info values ("preset002", "size M var", 7, 3);
insert into t_user_panel_info values ("preset002", NULL, 8, NULL);
insert into t_user_panel_info values ("preset002", NULL, 9, NULL);
insert into t_user_panel_info values ("preset002", NULL, 10, NULL);
insert into t_user_panel_info values ("preset002", NULL, 11, NULL);
insert into t_user_panel_info values ("preset002", "size S", 12, 5);
insert into t_user_panel_info values ("preset002", "size M hol", 13, 4);
insert into t_user_panel_info values ("preset002", NULL, 14, NULL);
insert into t_user_panel_info values ("preset002", "size S", 15, 5);
# preset003の作成
insert into t_user_panel_info values ("preset003", "size M var", 0, 3);
insert into t_user_panel_info values ("preset003", "size S", 1, 5);
insert into t_user_panel_info values ("preset003", "size L", 2, 2);
insert into t_user_panel_info values ("preset003", NULL, 3, NULL);
insert into t_user_panel_info values ("preset003", NULL, 4, NULL);
insert into t_user_panel_info values ("preset003", "size S", 5, 5);
insert into t_user_panel_info values ("preset003", NULL, 6, NULL);
insert into t_user_panel_info values ("preset003", NULL, 7, NULL);
insert into t_user_panel_info values ("preset003", "size L", 8, 2);
insert into t_user_panel_info values ("preset003", NULL, 9, NULL);
insert into t_user_panel_info values ("preset003", "size S", 10, 5);
insert into t_user_panel_info values ("preset003", "size M var", 11, 3);
insert into t_user_panel_info values ("preset003", NULL, 12, NULL);
insert into t_user_panel_info values ("preset003", NULL, 13, NULL);
insert into t_user_panel_info values ("preset003", "size S", 14, 5);
insert into t_user_panel_info values ("preset003", NULL, 15, NULL);
# preset004の作成
insert into t_user_panel_info values ("preset004", "size L", 0, 2);
insert into t_user_panel_info values ("preset004", NULL, 1, NULL);
insert into t_user_panel_info values ("preset004", "size M hol", 2, 4);
insert into t_user_panel_info values ("preset004", NULL, 3, NULL);
insert into t_user_panel_info values ("preset004", NULL, 4, NULL);
insert into t_user_panel_info values ("preset004", NULL, 5, NULL);
insert into t_user_panel_info values ("preset004", "size S", 6, 5);
insert into t_user_panel_info values ("preset004", "size M var", 7, 3);
insert into t_user_panel_info values ("preset004", "size M var", 8, 3);
insert into t_user_panel_info values ("preset004", "size S", 9, 5);
insert into t_user_panel_info values ("preset004", "size S", 10, 5);
insert into t_user_panel_info values ("preset004", NULL, 11, NULL);
insert into t_user_panel_info values ("preset004", NULL, 12, NULL);
insert into t_user_panel_info values ("preset004", "size M hol", 13, 4);
insert into t_user_panel_info values ("preset004", NULL, 14, NULL);
insert into t_user_panel_info values ("preset004", "size S", 15, 5);

# presetに使うパネル(m_panel)の作成
insert into m_panel values ("size L", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_L.jpg");
insert into m_panel values ("size M hol", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_M_h.jpg");
insert into m_panel values ("size M var", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_M_v.jpg");
insert into m_panel values ("size S", "/app/kindle_copy/kindle_copy.php", "/images/image_panel_S.jpg");

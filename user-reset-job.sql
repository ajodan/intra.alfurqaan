CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

CREATE TABLE `users`  (
  `id_users` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '$2y$10$1pec6NOp4NbuxkPeMbkXCOnxIU/mYagIfljT2lXPGXqsiwGwVvRG2',
  `level` enum('admin','ketua','bmm','bendahara','jamaah','pengurus') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_users`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin', 'ekselcorp@gmail.com', NULL, '$2y$10$sFjDfcoMSHEhj8U164NuqeNwOQfvQ2aULpcqzBdoA2hUZKEpPbkkS', 'admin', '1', NULL, NULL, '2022-12-16 20:16:03');
INSERT INTO `users` VALUES (2, 'Nurhadi, M. Pd', 'nurhadi', 'aaa@gmail.com', NULL, '$2y$10$pJKlrG3HrZc63H6S6/0CC.genRKlLpaA2yg3Dd2ONZJ2moqrAXPIu', 'ketua', '1', NULL, '2022-07-23 07:31:26', '2022-08-05 21:20:33');
INSERT INTO `users` VALUES (3, 'Ahmad Hidayat', 'ahmadhidayat', 'ahmadhidayat@gmail.com', NULL, '$2y$10$3IJnGeJW3z9ykWf94baaNePm8dHeOs8Yq8r1ICGEk/G3ni4v9cOHO', 'bmm', '1', NULL, '2022-08-05 21:11:25', '2022-11-17 07:52:44');
INSERT INTO `users` VALUES (4, 'Gunawan Ashari', 'gunawan', 'gunawan@gmail.com', NULL, '$2y$10$Qsbw/Swh.GHmyYVlkwrPdOUspMziMjZQFPgIAt6rQZq.AipYobAjS', 'bendahara', '0', NULL, '2022-11-19 01:13:08', '2022-11-19 01:13:08');

CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;
CREATE TABLE pesan (
  id_pesan INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  isi_pesan LONGTEXT NULL,
  waktu_kirim TIMESTAMP NULL,
  PRIMARY KEY(id_pesan)
);

CREATE TABLE jabatan (
  id_jabatan INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nama_jabatan VARCHAR(255) NULL,
  PRIMARY KEY(id_jabatan)
);

CREATE TABLE dinas (
  id_dinas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nama_dinas VARCHAR(255) NULL,
  PRIMARY KEY(id_dinas)
);

CREATE TABLE relasi_pesan (
  id_relasi_pesan INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_pesan INTEGER UNSIGNED NOT NULL,
  dari_user INTEGER UNSIGNED NULL,
  ke_user INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_relasi_pesan),
  INDEX relasi_pesan_FKIndex1(id_pesan),
  FOREIGN KEY(id_pesan)
    REFERENCES pesan(id_pesan)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE pengguna (
  id_pengguna INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_jabatan INTEGER UNSIGNED NOT NULL,
  id_dinas INTEGER UNSIGNED NOT NULL,
  username VARCHAR(255) NULL,
  password VARCHAR(255) NULL,
  blokir BOOL NULL,
  PRIMARY KEY(id_pengguna),
  INDEX pengguna_FKIndex1(id_dinas),
  INDEX pengguna_FKIndex2(id_jabatan),
  FOREIGN KEY(id_dinas)
    REFERENCES dinas(id_dinas)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_jabatan)
    REFERENCES jabatan(id_jabatan)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);



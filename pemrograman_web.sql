CREATE DATABASE praktikum_web;
USE praktikum_web;

CREATE TABLE data_mahasiswa (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nrp VARCHAR(15) NOT NULL,
    alamat VARCHAR(200),
    ttl VARCHAR(50),
    email VARCHAR(50),
    nohp VARCHAR(15),
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS upload (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    size VARCHAR(20) NOT NULL,
    type VARCHAR(200) NOT NULL,
    content VARCHAR(200) NOT NULL,
    path VARCHAR(200) NOT NULL
);

CREATE TABLE jadwal_kuliah (
    id_jadwal SERIAL PRIMARY KEY,
    nama_matkul VARCHAR(100),
    status VARCHAR(20) DEFAULT 'tutup',
    jadwal_waktu TIMESTAMP
);

CREATE TABLE presensi_kuliah (
    id_presensi SERIAL PRIMARY KEY,
    nrp VARCHAR(20),
    id_jadwal INT REFERENCES jadwal_kuliah(id_jadwal),
    waktu_hadir TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status CHAR(1) DEFAULT 'H'
);

CREATE TABLE peserta_kelas (
    id_peserta SERIAL PRIMARY KEY,
    nrp VARCHAR(20),
    id_jadwal INT REFERENCES jadwal_kuliah(id_jadwal)
);

CREATE TABLE tugas (
    id_tugas SERIAL PRIMARY KEY,
    id_jadwal INT REFERENCES jadwal_kuliah(id_jadwal),
    judul_tugas VARCHAR(100),
    deskripsi TEXT,
    deadline TIMESTAMP
);

ALTER TABLE upload ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
SELECT * FROM users;

-- Tambahkan ini agar file punya "alamat" ke mata kuliah mana
ALTER TABLE upload ADD COLUMN id_jadwal INT, 
ADD CONSTRAINT fk_upload_jadwal FOREIGN KEY (id_jadwal) REFERENCES jadwal_kuliah(id_jadwal);

ALTER TABLE presensi 

ALTER TABLE data_mahasiswa ALTER COLUMN password TYPE VARCHAR(255);
ALTER TABLE data_mahasiswa ALTER COLUMN nrp TYPE VARCHAR(100);
ALTER TABLE data_mahasiswa ADD COLUMN foto VARCHAR(255);
SELECT column_name FROM information_schema.columns WHERE table_name = 'jadwal_kuliah';
DELETE FROM data_mahasiswa;
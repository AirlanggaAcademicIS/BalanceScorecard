/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     5/2/2016 7:27:21 PM                          */
/*==============================================================*/


drop table if exists INDIKATOR_PROKER;

drop table if exists INDIKATOR_TUJUAN;

drop table if exists KARYAWAN;

drop table if exists LAPORAN_PERTANGGUNG_JAWABAN;

drop table if exists MENUNJANG;

drop table if exists NOTIFIKASI;

drop table if exists PROKER;

drop table if exists TUJUAN;

/*==============================================================*/
/* Table: INDIKATOR_PROKER                                      */
/*==============================================================*/
create table INDIKATOR_PROKER
(
   ID_INDIKATOR_PROKER  int not null auto_increment,
   ID_PROKER            int not null,
   NAMA_INDIKATOR_PROKER varchar(60),
   STATUS_INDIKATOR_PROKER varchar(20),
   primary key (ID_INDIKATOR_PROKER)
)
auto_increment = 1;

/*==============================================================*/
/* Table: INDIKATOR_TUJUAN                                      */
/*==============================================================*/
create table INDIKATOR_TUJUAN
(
   ID_INDIKATOR_TUJUAN  int not null auto_increment,
   ID_TUJUAN            int not null,
   NAMA_INDIKATOR_TUJUAN varchar(60),
   STATUS_INDIKATOR_TUJUAN varchar(20),
   primary key (ID_INDIKATOR_TUJUAN)
)
auto_increment = 1;

/*==============================================================*/
/* Table: KARYAWAN                                              */
/*==============================================================*/
create table KARYAWAN
(
   NIP                  varchar(20) not null,
   NAMA                 varchar(50),
   JABATAN              varchar(20),
   PASSWORD             varchar(50),
   TANGGAL_LAHIR        date,
   primary key (NIP)
);

/*==============================================================*/
/* Table: LAPORAN_PERTANGGUNG_JAWABAN                           */
/*==============================================================*/
create table LAPORAN_PERTANGGUNG_JAWABAN
(
   ID_LPJ               int not null auto_increment,
   ID_PROKER            int not null,
   EVALUASI             text,
   KEBERLANJUTAN        text,
   primary key (ID_LPJ)
)
auto_increment = 1;

/*==============================================================*/
/* Table: MENUNJANG                                             */
/*==============================================================*/
create table MENUNJANG
(
   ID_INDIKATOR_TUJUAN  int not null,
   ID_PROKER            int not null,
   primary key (ID_INDIKATOR_TUJUAN, ID_PROKER)
);

/*==============================================================*/
/* Table: NOTIFIKASI                                            */
/*==============================================================*/
create table NOTIFIKASI
(
   ID_NOTIFIKASI        int not null auto_increment,
   ID_PROKER            int not null,
   NOTIFIKASI           text,
   primary key (ID_NOTIFIKASI)
)
auto_increment = 1;

/*==============================================================*/
/* Table: PROKER                                                */
/*==============================================================*/
create table PROKER
(
   ID_PROKER            int not null auto_increment,
   NIP                  varchar(20) not null,
   ID_NOTIFIKASI        int,
   ID_LPJ               int,
   DESKRIPSI            text,
   NAMA_PROKER          varchar(50),
   ANGGARAN_DANA        int,
   STATUS_PROKER        varchar(20),
   LATAR_BELAKANG       text,
   TUJUAN               text,
   MEKANISME_DAN_RANCANGAN text,
   WAKTU_MULAI_PROKER   date,
   WAKTU_AKHIR_PROKER   date,
   PENDAHULUAN          text,
   primary key (ID_PROKER)
)
auto_increment = 1;

/*==============================================================*/
/* Table: TUJUAN                                                */
/*==============================================================*/
create table TUJUAN
(
   ID_TUJUAN            int not null auto_increment,
   TUJUAN_ORGANISASI    varchar(50),
   PERSPEKTIF           varchar(30),
   primary key (ID_TUJUAN)
)
auto_increment = 1;

alter table INDIKATOR_PROKER add constraint FK_MEMILIKI1 foreign key (ID_PROKER)
      references PROKER (ID_PROKER) on delete cascade on update cascade;

alter table INDIKATOR_TUJUAN add constraint FK_MEMILIKI foreign key (ID_TUJUAN)
      references TUJUAN (ID_TUJUAN) on delete cascade on update cascade;

alter table LAPORAN_PERTANGGUNG_JAWABAN add constraint FK_MEMPUNYAI2 foreign key (ID_PROKER)
      references PROKER (ID_PROKER) on delete cascade on update cascade;

alter table MENUNJANG add constraint FK_MENUNJANG foreign key (ID_INDIKATOR_TUJUAN)
      references INDIKATOR_TUJUAN (ID_INDIKATOR_TUJUAN) on delete cascade on update cascade;

alter table MENUNJANG add constraint FK_MENUNJANG2 foreign key (ID_PROKER)
      references PROKER (ID_PROKER) on delete cascade on update cascade;

alter table NOTIFIKASI add constraint FK_PUNYA foreign key (ID_PROKER)
      references PROKER (ID_PROKER) on delete cascade on update cascade;

alter table PROKER add constraint FK_KOORDINATOR foreign key (NIP)
      references KARYAWAN (NIP) on delete cascade on update cascade;

alter table PROKER add constraint FK_MEMPUNYAI foreign key (ID_LPJ)
      references LAPORAN_PERTANGGUNG_JAWABAN (ID_LPJ) on delete cascade on update cascade;

alter table PROKER add constraint FK_PUNYA2 foreign key (ID_NOTIFIKASI)
      references NOTIFIKASI (ID_NOTIFIKASI) on delete cascade on update cascade;


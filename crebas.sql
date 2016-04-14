/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/13/2016 5:19:37 PM                         */
/*==============================================================*/


drop table if exists INDIKATOR_PROKER;

drop table if exists INDIKATOR_TUJUAN;

drop table if exists KARYAWAN;

drop table if exists LAPORAN_PERTANGGUNG_JAWABAN;

drop table if exists MENUNJANG;

drop table if exists PROKER;

drop table if exists TUJUAN;

/*==============================================================*/
/* Table: INDIKATOR_PROKER                                      */
/*==============================================================*/
create table INDIKATOR_PROKER
(
   ID_INDIKATOR_PROKER  varchar(20) not null,
   ID_PROKER            varchar(20) not null,
   NAMA_INDIKATOR_PROKER varchar(20),
   STATUS_INDIKATOR_PROKER varchar(20),
   primary key (ID_INDIKATOR_PROKER)
);

/*==============================================================*/
/* Table: INDIKATOR_TUJUAN                                      */
/*==============================================================*/
create table INDIKATOR_TUJUAN
(
   ID_INDIKATOR_TUJUAN  varchar(20) not null,
   ID_TUJUAN            varchar(20) not null,
   NAMA_INDIKATOR_TUJUAN varchar(20),
   STATUS_INDIKATOR_TUJUAN varchar(20),
   primary key (ID_INDIKATOR_TUJUAN)
);

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
   ID_LPJ               varchar(30) not null,
   ID_PROKER            varchar(20) not null,
   EVALUASI             text,
   KEBERLANJUTAN        text,
   primary key (ID_LPJ)
);

/*==============================================================*/
/* Table: MENUNJANG                                             */
/*==============================================================*/
create table MENUNJANG
(
   ID_INDIKATOR_TUJUAN  varchar(20) not null,
   ID_PROKER            varchar(20) not null,
   primary key (ID_INDIKATOR_TUJUAN, ID_PROKER)
);

/*==============================================================*/
/* Table: PROKER                                                */
/*==============================================================*/
create table PROKER
(
   ID_PROKER            varchar(20) not null,
   NIP                  varchar(20) not null,
   ID_LPJ               varchar(30),
   DESKRIPSI            text,
   NAMA_PROKER          varchar(50),
   ANGGARAN_DANA        int,
   STATUS_PROKER        varchar(10),
   LATAR_BELAKANG       text,
   TUJUAN               text,
   MEKANISME_DAN_RANCANGAN text,
   WAKTU_MULAI_PROKER   date,
   WAKTU_AKHIR_PROKER   date,
   PENDAHULUAN          text,
   primary key (ID_PROKER)
);

/*==============================================================*/
/* Table: TUJUAN                                                */
/*==============================================================*/
create table TUJUAN
(
   ID_TUJUAN            varchar(20) not null,
   TUJUAN_ORGANISASI    varchar(50),
   PERSPEKTIF           varchar(30),
   primary key (ID_TUJUAN)
);

alter table INDIKATOR_PROKER add constraint FK_MEMILIKI1 foreign key (ID_PROKER)
      references PROKER (ID_PROKER) on delete restrict on update restrict;

alter table INDIKATOR_TUJUAN add constraint FK_MEMILIKI foreign key (ID_TUJUAN)
      references TUJUAN (ID_TUJUAN) on delete restrict on update restrict;

alter table LAPORAN_PERTANGGUNG_JAWABAN add constraint FK_MEMPUNYAI2 foreign key (ID_PROKER)
      references PROKER (ID_PROKER) on delete restrict on update restrict;

alter table MENUNJANG add constraint FK_MENUNJANG foreign key (ID_INDIKATOR_TUJUAN)
      references INDIKATOR_TUJUAN (ID_INDIKATOR_TUJUAN) on delete restrict on update restrict;

alter table MENUNJANG add constraint FK_MENUNJANG2 foreign key (ID_PROKER)
      references PROKER (ID_PROKER) on delete restrict on update restrict;

alter table PROKER add constraint FK_KOORDINATOR foreign key (NIP)
      references KARYAWAN (NIP) on delete restrict on update restrict;

alter table PROKER add constraint FK_MEMPUNYAI foreign key (ID_LPJ)
      references LAPORAN_PERTANGGUNG_JAWABAN (ID_LPJ) on delete restrict on update restrict;


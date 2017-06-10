DROP TABLE IF EXISTS sc_akrifwz.tr_aktifitas;
DROP TABLE IF EXISTS sc_akrifwz.master_aktifitas;
DROP TABLE IF EXISTS sc_akrifwz.master_kategori_aktifitas;

-- Table: sc_akrifwz.master_kategori_aktifitas

CREATE TABLE sc_akrifwz.master_kategori_aktifitas
(
  kategori_id serial NOT NULL,
  kategori_nama character varying(20),
  kategori_keterangan character varying(200),
  created_date timestamp without time zone DEFAULT now(),
  created_by character varying(200),
  modified_date timestamp without time zone,
  modified_by character varying(200),
  record_active smallint DEFAULT 1,
  CONSTRAINT pk_master_kategori_aktifitas PRIMARY KEY (kategori_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sc_akrifwz.master_kategori_aktifitas
  OWNER TO postgres;

-- Trigger: tru_master_kategori_aktifitas on sc_akrifwz.master_kategori_aktifitas

CREATE TRIGGER tru_master_kategori_aktifitas
  BEFORE UPDATE
  ON sc_akrifwz.master_kategori_aktifitas
  FOR EACH ROW
  EXECUTE PROCEDURE sc_akrifwz.tru_update_date();

-- Table: sc_akrifwz.master_aktifitas

CREATE TABLE sc_akrifwz.master_aktifitas
(
  aktifitas_id serial NOT NULL,
  kategori_id integer,
  aktifitas_kode character varying(20),
  aktifitas_nama character varying(200),
  aktifitas_output character varying(50),
  aktifitas_waktu smallint,
  aktifitas_kesulitan numeric(2,1),
  aktifitas_bobot smallint,
  aktifitas_status smallint DEFAULT 0,
  created_date timestamp without time zone DEFAULT now(),
  created_by character varying(200),
  modified_date timestamp without time zone,
  modified_by character varying(200),
  record_active smallint DEFAULT 1,
  CONSTRAINT pk_master_aktifitas PRIMARY KEY (aktifitas_id),
  CONSTRAINT fk_master_aktifitas_master_kategori_aktifitas FOREIGN KEY (kategori_id)
      REFERENCES sc_akrifwz.master_kategori_aktifitas (kategori_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sc_akrifwz.master_aktifitas
  OWNER TO postgres;

-- Trigger: tru_master_aktifitas on sc_akrifwz.master_aktifitas

CREATE TRIGGER tru_master_aktifitas
  BEFORE UPDATE
  ON sc_akrifwz.master_aktifitas
  FOR EACH ROW
  EXECUTE PROCEDURE sc_akrifwz.tru_update_date();

-- Table: sc_akrifwz.tr_aktifitas

CREATE TABLE sc_akrifwz.tr_aktifitas
(
  tr_aktifitas_id serial NOT NULL,
  aktifitas_id integer,
  tr_aktifitas_tanggal date,
  tr_aktifitas_volume smallint,
  tr_aktifitas_mulai time without time zone,
  tr_aktifitas_selesai time without time zone,
  tr_aktifitas_keterangan character varying(200),
  tr_aktifitas_status smallint DEFAULT 0,
  created_date timestamp without time zone DEFAULT now(),
  created_by character varying(200),
  modified_date timestamp without time zone,
  modified_by character varying(200),
  record_active smallint DEFAULT 1,
  CONSTRAINT pk_tr_aktifitas PRIMARY KEY (tr_aktifitas_id),
  CONSTRAINT fk_tr_aktifitas_master_aktifitas FOREIGN KEY (tr_aktifitas_id)
      REFERENCES sc_akrifwz.master_aktifitas (aktifitas_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sc_akrifwz.tr_aktifitas
  OWNER TO postgres;

-- Trigger: tru_tr_aktifitas on sc_akrifwz.tr_aktifitas

CREATE TRIGGER tru_tr_aktifitas
  BEFORE UPDATE
  ON sc_akrifwz.tr_aktifitas
  FOR EACH ROW
  EXECUTE PROCEDURE sc_akrifwz.tru_update_date();


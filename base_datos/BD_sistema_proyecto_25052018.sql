--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: e_area_cadena; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_area_cadena (
    id_area integer NOT NULL,
    id_cadena integer,
    area character varying(150),
    estatus_area integer
);


ALTER TABLE public.e_area_cadena OWNER TO postgres;

--
-- Name: e_area_cadena_id_area_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_area_cadena_id_area_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_area_cadena_id_area_seq OWNER TO postgres;

--
-- Name: e_area_cadena_id_area_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_area_cadena_id_area_seq OWNED BY e_area_cadena.id_area;


--
-- Name: e_cadena; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_cadena (
    id_cadena integer NOT NULL,
    cadena character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_cadena OWNER TO postgres;

--
-- Name: e_cadena_id_cadena_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_cadena_id_cadena_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_cadena_id_cadena_seq OWNER TO postgres;

--
-- Name: e_cadena_id_cadena_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_cadena_id_cadena_seq OWNED BY e_cadena.id_cadena;


--
-- Name: e_circuito; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_circuito (
    id_circuito integer NOT NULL,
    id_municipio integer NOT NULL,
    circuito character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_circuito OWNER TO postgres;

--
-- Name: e_circuito_id_circuito_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_circuito_id_circuito_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_circuito_id_circuito_seq OWNER TO postgres;

--
-- Name: e_circuito_id_circuito_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_circuito_id_circuito_seq OWNED BY e_circuito.id_circuito;


--
-- Name: e_eje_parroquial; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_eje_parroquial (
    id_eje integer NOT NULL,
    id_parroquia integer NOT NULL,
    eje character varying(255) NOT NULL,
    estatus integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.e_eje_parroquial OWNER TO postgres;

--
-- Name: e_eje_parroquial_id_eje_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_eje_parroquial_id_eje_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_eje_parroquial_id_eje_seq OWNER TO postgres;

--
-- Name: e_eje_parroquial_id_eje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_eje_parroquial_id_eje_seq OWNED BY e_eje_parroquial.id_eje;


--
-- Name: e_ente_financiamiento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_ente_financiamiento (
    id_ente integer NOT NULL,
    ente character varying(100),
    estatus_tabla integer
);


ALTER TABLE public.e_ente_financiamiento OWNER TO postgres;

--
-- Name: e_ente_financiamiento_id_ente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_ente_financiamiento_id_ente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_ente_financiamiento_id_ente_seq OWNER TO postgres;

--
-- Name: e_ente_financiamiento_id_ente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_ente_financiamiento_id_ente_seq OWNED BY e_ente_financiamiento.id_ente;


--
-- Name: e_estado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_estado (
    id integer NOT NULL,
    texto character varying(60),
    latitud character varying(20),
    longitud character varying(20)
);


ALTER TABLE public.e_estado OWNER TO postgres;

--
-- Name: e_estatus_actividades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_estatus_actividades (
    id_estatus integer NOT NULL,
    estatus character varying(30),
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.e_estatus_actividades OWNER TO postgres;

--
-- Name: e_estatus_actividades_id_estatus_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_estatus_actividades_id_estatus_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_estatus_actividades_id_estatus_seq OWNER TO postgres;

--
-- Name: e_estatus_actividades_id_estatus_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_estatus_actividades_id_estatus_seq OWNED BY e_estatus_actividades.id_estatus;


--
-- Name: e_estatus_financiamiento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_estatus_financiamiento (
    id_estatus_financiamiento integer NOT NULL,
    estatus_financiamiento character varying(50),
    estatus_tabla integer
);


ALTER TABLE public.e_estatus_financiamiento OWNER TO postgres;

--
-- Name: e_estatus_financiamiento_id_estatus_financiamiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_estatus_financiamiento_id_estatus_financiamiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_estatus_financiamiento_id_estatus_financiamiento_seq OWNER TO postgres;

--
-- Name: e_estatus_financiamiento_id_estatus_financiamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_estatus_financiamiento_id_estatus_financiamiento_seq OWNED BY e_estatus_financiamiento.id_estatus_financiamiento;


--
-- Name: e_figura_juridica; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_figura_juridica (
    id_figura integer NOT NULL,
    figura_juridica character varying(50),
    estatus_tabla integer
);


ALTER TABLE public.e_figura_juridica OWNER TO postgres;

--
-- Name: e_figura_juridica_id_figura_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_figura_juridica_id_figura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_figura_juridica_id_figura_seq OWNER TO postgres;

--
-- Name: e_figura_juridica_id_figura_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_figura_juridica_id_figura_seq OWNED BY e_figura_juridica.id_figura;


--
-- Name: e_municipio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_municipio (
    id integer NOT NULL,
    id_geo_estado integer,
    texto character varying(60),
    longitud character varying(20),
    latitud character varying(20)
);


ALTER TABLE public.e_municipio OWNER TO postgres;

--
-- Name: e_organizacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_organizacion (
    id_org integer NOT NULL,
    id_tipo_org integer NOT NULL,
    organizacion character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_organizacion OWNER TO postgres;

--
-- Name: e_parroquia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_parroquia (
    id integer NOT NULL,
    id_geo_municipio integer,
    texto character varying(60),
    latitud character varying(20),
    longitud character varying(20),
    id_circuito integer
);


ALTER TABLE public.e_parroquia OWNER TO postgres;

--
-- Name: e_perfil_usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_perfil_usuario (
    id_perfil integer NOT NULL,
    descripcion_perfil character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_perfil_usuario OWNER TO postgres;

--
-- Name: e_perfil_usuario_id_perfil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_perfil_usuario_id_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_perfil_usuario_id_perfil_seq OWNER TO postgres;

--
-- Name: e_perfil_usuario_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_perfil_usuario_id_perfil_seq OWNED BY e_perfil_usuario.id_perfil;


--
-- Name: e_tipo_organizacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_tipo_organizacion (
    id_tipo_org integer NOT NULL,
    tipo_org character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_tipo_organizacion OWNER TO postgres;

--
-- Name: e_tipo_organizacion_id_tipo_org_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE e_tipo_organizacion_id_tipo_org_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_tipo_organizacion_id_tipo_org_seq OWNER TO postgres;

--
-- Name: e_tipo_organizacion_id_tipo_org_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_tipo_organizacion_id_tipo_org_seq OWNED BY e_tipo_organizacion.id_tipo_org;


--
-- Name: e_unidades_Tiempo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "e_unidades_Tiempo" (
    "idUnidadTiempo" integer NOT NULL,
    "descUnidadTiempo" character varying(50) NOT NULL,
    "estatusUnidadTiempo" integer DEFAULT 1 NOT NULL
);


ALTER TABLE public."e_unidades_Tiempo" OWNER TO postgres;

--
-- Name: e_unidades_Tiempo_idUnidadTiempo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "e_unidades_Tiempo_idUnidadTiempo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."e_unidades_Tiempo_idUnidadTiempo_seq" OWNER TO postgres;

--
-- Name: e_unidades_Tiempo_idUnidadTiempo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "e_unidades_Tiempo_idUnidadTiempo_seq" OWNED BY "e_unidades_Tiempo"."idUnidadTiempo";


--
-- Name: geo_estado_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE geo_estado_id_seq
    START WITH 25
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.geo_estado_id_seq OWNER TO postgres;

--
-- Name: geo_estado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE geo_estado_id_seq OWNED BY e_estado.id;


--
-- Name: geo_municipio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE geo_municipio_id_seq
    START WITH 336
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.geo_municipio_id_seq OWNER TO postgres;

--
-- Name: geo_municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE geo_municipio_id_seq OWNED BY e_municipio.id;


--
-- Name: geo_parroquia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE geo_parroquia_id_seq
    START WITH 1136
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.geo_parroquia_id_seq OWNER TO postgres;

--
-- Name: geo_parroquia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE geo_parroquia_id_seq OWNED BY e_parroquia.id;


--
-- Name: v_actividades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_actividades (
    id_actividad integer NOT NULL,
    id_proyecto integer NOT NULL,
    tarea text,
    fecha_inicio date NOT NULL,
    fecha_fin date,
    id_usuario integer,
    fecha_registro date,
    id_usuario_registra integer,
    id_estatus integer,
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_actividades OWNER TO postgres;

--
-- Name: v_actividades_id_actividad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_actividades_id_actividad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_actividades_id_actividad_seq OWNER TO postgres;

--
-- Name: v_actividades_id_actividad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_actividades_id_actividad_seq OWNED BY v_actividades.id_actividad;


--
-- Name: v_financiamiento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_financiamiento (
    id_financiamiento integer NOT NULL,
    id_proyecto integer,
    obj_financiamiento character varying(100),
    id_ente_financiamiento integer,
    id_estatus_financiamiento integer,
    monto character varying(20),
    monto_aprobado character varying(20),
    monto_transferido character varying(20),
    monto_pendiente character varying(20),
    anio_financiamiento character varying(15),
    tipo_financiamiento character varying(15),
    estatus_tabla_financiamiento integer
);


ALTER TABLE public.v_financiamiento OWNER TO postgres;

--
-- Name: v_financiamiento_id_financiamiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_financiamiento_id_financiamiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_financiamiento_id_financiamiento_seq OWNER TO postgres;

--
-- Name: v_financiamiento_id_financiamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_financiamiento_id_financiamiento_seq OWNED BY v_financiamiento.id_financiamiento;


--
-- Name: v_fotos_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_fotos_proyecto (
    id_registro integer NOT NULL,
    id_proyecto integer NOT NULL,
    nombre_archivo character varying(250),
    descripcion_archivo text,
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_fotos_proyecto OWNER TO postgres;

--
-- Name: v_fotos_proyecto_id_registro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_fotos_proyecto_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_fotos_proyecto_id_registro_seq OWNER TO postgres;

--
-- Name: v_fotos_proyecto_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_fotos_proyecto_id_registro_seq OWNED BY v_fotos_proyecto.id_registro;


--
-- Name: v_general; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_general (
    id_registro integer NOT NULL,
    id_proyecto integer NOT NULL,
    estado_actual text,
    problema_actual text,
    estrategia text,
    porcentaje_avance character varying(3),
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_general OWNER TO postgres;

--
-- Name: v_general_id_registro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_general_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_general_id_registro_seq OWNER TO postgres;

--
-- Name: v_general_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_general_id_registro_seq OWNED BY v_general.id_registro;


--
-- Name: v_historico_ingreso_exitoso; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_historico_ingreso_exitoso (
    id integer NOT NULL,
    usuario character(1000) NOT NULL,
    direccion_ip character(50) NOT NULL,
    nombre_maquina character(200) NOT NULL,
    fecha date NOT NULL,
    hora time without time zone NOT NULL
);


ALTER TABLE public.v_historico_ingreso_exitoso OWNER TO postgres;

--
-- Name: v_historico_ingreso_exitoso_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_historico_ingreso_exitoso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_historico_ingreso_exitoso_id_seq OWNER TO postgres;

--
-- Name: v_historico_ingreso_exitoso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_historico_ingreso_exitoso_id_seq OWNED BY v_historico_ingreso_exitoso.id;


--
-- Name: v_historico_ingreso_fallido; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_historico_ingreso_fallido (
    id integer NOT NULL,
    usuario character(50) NOT NULL,
    direccion_ip character(20) NOT NULL,
    nombre_maquina character(200) NOT NULL,
    fecha date NOT NULL,
    hora time without time zone NOT NULL
);


ALTER TABLE public.v_historico_ingreso_fallido OWNER TO postgres;

--
-- Name: v_historico_ingreso_fallido_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_historico_ingreso_fallido_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_historico_ingreso_fallido_id_seq OWNER TO postgres;

--
-- Name: v_historico_ingreso_fallido_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_historico_ingreso_fallido_id_seq OWNED BY v_historico_ingreso_fallido.id;


--
-- Name: v_inversion_fragmentada; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_inversion_fragmentada (
    id_inversion_fragmentada integer NOT NULL,
    id_proyecto integer,
    infraestructura character varying(50),
    maquinaria character varying(50),
    insumos character varying(50),
    fuerza_trabajo character varying(50),
    servicios character varying(50),
    inversion character varying(50),
    estatus_tabla integer
);


ALTER TABLE public.v_inversion_fragmentada OWNER TO postgres;

--
-- Name: v_inversion_fragmentada_id_inversion_fragmentada_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_inversion_fragmentada_id_inversion_fragmentada_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_inversion_fragmentada_id_inversion_fragmentada_seq OWNER TO postgres;

--
-- Name: v_inversion_fragmentada_id_inversion_fragmentada_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_inversion_fragmentada_id_inversion_fragmentada_seq OWNED BY v_inversion_fragmentada.id_inversion_fragmentada;


--
-- Name: v_org_comunitarias_sociales_vinculadas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_org_comunitarias_sociales_vinculadas (
    id_registro integer NOT NULL,
    id_proyecto integer NOT NULL,
    id_tipo_org integer,
    id_org integer,
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_org_comunitarias_sociales_vinculadas OWNER TO postgres;

--
-- Name: v_org_comunitarias_sociales_vinculadas_id_registro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_org_comunitarias_sociales_vinculadas_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_org_comunitarias_sociales_vinculadas_id_registro_seq OWNER TO postgres;

--
-- Name: v_org_comunitarias_sociales_vinculadas_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_org_comunitarias_sociales_vinculadas_id_registro_seq OWNED BY v_org_comunitarias_sociales_vinculadas.id_registro;


--
-- Name: v_organizacion_id_org_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_organizacion_id_org_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_organizacion_id_org_seq OWNER TO postgres;

--
-- Name: v_organizacion_id_org_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_organizacion_id_org_seq OWNED BY e_organizacion.id_org;


--
-- Name: v_produccion_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_produccion_proyecto (
    id_produccion_proyecto integer NOT NULL,
    id_proyecto integer,
    estatus_produccion character varying(2),
    fecha_produccion date,
    prod_principal character varying(500) NOT NULL,
    meta_produccion character varying(500) NOT NULL,
    beneficiarios integer,
    estatus_tabla_produccion integer
);


ALTER TABLE public.v_produccion_proyecto OWNER TO postgres;

--
-- Name: v_produccion_proyecto_id_produccion_proyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_produccion_proyecto_id_produccion_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_produccion_proyecto_id_produccion_proyecto_seq OWNER TO postgres;

--
-- Name: v_produccion_proyecto_id_produccion_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_produccion_proyecto_id_produccion_proyecto_seq OWNED BY v_produccion_proyecto.id_produccion_proyecto;


--
-- Name: v_productor_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_productor_proyecto (
    id_productor integer NOT NULL,
    id_proyecto integer NOT NULL,
    nomb_apel_productor character varying(100) NOT NULL,
    sexo_productor character varying(1) NOT NULL,
    tlf_productor character varying(11) NOT NULL,
    email_productor character varying(50) NOT NULL,
    estatus_productor integer NOT NULL
);


ALTER TABLE public.v_productor_proyecto OWNER TO postgres;

--
-- Name: v_productor_proyecto_id_productor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_productor_proyecto_id_productor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productor_proyecto_id_productor_seq OWNER TO postgres;

--
-- Name: v_productor_proyecto_id_productor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_productor_proyecto_id_productor_seq OWNED BY v_productor_proyecto.id_productor;


--
-- Name: v_productores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_productores (
    id_registro integer NOT NULL,
    id_proyecto integer NOT NULL,
    num_pro_directos integer NOT NULL,
    num_prod_femeninos integer NOT NULL,
    num_prod_masculinos integer NOT NULL,
    num_prod_indirectos integer,
    estatus_tabla integer
);


ALTER TABLE public.v_productores OWNER TO postgres;

--
-- Name: v_productores_id_registro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_productores_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productores_id_registro_seq OWNER TO postgres;

--
-- Name: v_productores_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_productores_id_registro_seq OWNED BY v_productores.id_registro;


--
-- Name: v_productores_nuevo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_productores_nuevo (
    id_productor integer NOT NULL,
    cedula integer,
    nombre_apellido character varying(50),
    telefono_1 character varying(11),
    telefono_2 character varying,
    correo_electronico character varying(50),
    status_productor integer,
    serial_carnet integer,
    codigo_carnet integer,
    direccion text,
    fecha_registro date,
    id_usuario_registro integer
);


ALTER TABLE public.v_productores_nuevo OWNER TO postgres;

--
-- Name: v_productores_nuevo_id_productor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_productores_nuevo_id_productor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productores_nuevo_id_productor_seq OWNER TO postgres;

--
-- Name: v_productores_nuevo_id_productor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_productores_nuevo_id_productor_seq OWNED BY v_productores_nuevo.id_productor;


--
-- Name: v_productos_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_productos_proyecto (
    id_producto_proyecto integer NOT NULL,
    id_produccion_proyecto integer,
    id_proyecto integer,
    capacidad_instalada character varying(250),
    cantidad character varying(250),
    tiempo_produccion character varying(15),
    precio_venta character varying(20),
    terreno_producto character varying(2),
    infra_producto character varying(2),
    estatus_tabla_producto integer
);


ALTER TABLE public.v_productos_proyecto OWNER TO postgres;

--
-- Name: v_productos_proyecto_id_producto_proyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_productos_proyecto_id_producto_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productos_proyecto_id_producto_proyecto_seq OWNER TO postgres;

--
-- Name: v_productos_proyecto_id_producto_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_productos_proyecto_id_producto_proyecto_seq OWNED BY v_productos_proyecto.id_producto_proyecto;


--
-- Name: v_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_proyecto (
    id_proyecto integer NOT NULL,
    nombre_proyecto character varying(250),
    descripcion_proyecto text,
    comite_eco_comunal character varying(2),
    id_fig_juridica integer,
    figura_jur_reg character varying(100) NOT NULL,
    fecha_registro_proyecto date,
    area_construccion character varying(50),
    area_terreno character varying(50),
    unidades_produccion character varying(10),
    tiempo_instalacion character varying(50),
    elaboracion character varying(50),
    titularidad character varying(25),
    proceso_formativo character varying(25),
    balance_politico text,
    estatus_tabla_proyecto integer,
    id_usuario_registra integer,
    requerimiento text,
    posee text
);


ALTER TABLE public.v_proyecto OWNER TO postgres;

--
-- Name: v_proyecto_id_proyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_proyecto_id_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_proyecto_id_proyecto_seq OWNER TO postgres;

--
-- Name: v_proyecto_id_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_proyecto_id_proyecto_seq OWNED BY v_proyecto.id_proyecto;


--
-- Name: v_responsables_proyectos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_responsables_proyectos (
    "idRespproyecto" integer NOT NULL,
    "idProyecto" integer NOT NULL,
    "fechaAsignacion" date NOT NULL,
    "usuarioAsigna" integer NOT NULL,
    "idUsuario" integer NOT NULL,
    "estausResp" integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_responsables_proyectos OWNER TO postgres;

--
-- Name: v_responsables_proyectos_idRespproyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "v_responsables_proyectos_idRespproyecto_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."v_responsables_proyectos_idRespproyecto_seq" OWNER TO postgres;

--
-- Name: v_responsables_proyectos_idRespproyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "v_responsables_proyectos_idRespproyecto_seq" OWNED BY v_responsables_proyectos."idRespproyecto";


--
-- Name: v_seguimiento_actividades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_seguimiento_actividades (
    id_seguimiento integer NOT NULL,
    id_actividad integer NOT NULL,
    avance_actividad text,
    dificultad_actividad text,
    fecha_avance date NOT NULL,
    porcentaje_avance_actividad integer,
    id_usuario_registra integer,
    id_estatus integer,
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_seguimiento_actividades OWNER TO postgres;

--
-- Name: v_seguimiento_actividades_id_seguimiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_seguimiento_actividades_id_seguimiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_seguimiento_actividades_id_seguimiento_seq OWNER TO postgres;

--
-- Name: v_seguimiento_actividades_id_seguimiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_seguimiento_actividades_id_seguimiento_seq OWNED BY v_seguimiento_actividades.id_seguimiento;


--
-- Name: v_tipo_actividad_economica; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_tipo_actividad_economica (
    id_registro integer NOT NULL,
    id_proyecto integer NOT NULL,
    id_cadena integer,
    id_area_cadena integer,
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_tipo_actividad_economica OWNER TO postgres;

--
-- Name: v_tipo_actividad_economica_id_registro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_tipo_actividad_economica_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_tipo_actividad_economica_id_registro_seq OWNER TO postgres;

--
-- Name: v_tipo_actividad_economica_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_tipo_actividad_economica_id_registro_seq OWNED BY v_tipo_actividad_economica.id_registro;


--
-- Name: v_ubicacion_proyecto_georeferencial; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_ubicacion_proyecto_georeferencial (
    id_registro integer NOT NULL,
    id_proyecto integer,
    estado integer,
    municipio integer,
    parroquia integer,
    id_circuito integer,
    id_eje_parroquial integer,
    latitud character varying(20),
    longitud character varying(20),
    direccion character varying(500) NOT NULL,
    estatus_tabla integer DEFAULT 1
);


ALTER TABLE public.v_ubicacion_proyecto_georeferencial OWNER TO postgres;

--
-- Name: v_ubicacion_proyecto_georeferencial_id_registro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_ubicacion_proyecto_georeferencial_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_ubicacion_proyecto_georeferencial_id_registro_seq OWNER TO postgres;

--
-- Name: v_ubicacion_proyecto_georeferencial_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_ubicacion_proyecto_georeferencial_id_registro_seq OWNED BY v_ubicacion_proyecto_georeferencial.id_registro;


--
-- Name: v_usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_usuarios (
    id_usuario integer NOT NULL,
    cedula integer NOT NULL,
    nombre_usuario character varying(50) NOT NULL,
    telefono_1 character varying(11) NOT NULL,
    telefono_2 character varying(11) NOT NULL,
    correo_electronico character varying(50) NOT NULL,
    login character varying(15) NOT NULL,
    password character varying(50) NOT NULL,
    fecha_registro timestamp without time zone NOT NULL,
    id_usuario_registra integer NOT NULL,
    ip_maquina_registra character varying(50) NOT NULL,
    status_usuario smallint DEFAULT (1)::smallint NOT NULL,
    status_clave smallint DEFAULT (0)::smallint NOT NULL,
    id_perfil integer,
    id_parroquia integer,
    posee character(255),
    requiere character(255),
    tipo character(255),
    terreno character(250),
    tipo_proyecto character(1)
);


ALTER TABLE public.v_usuarios OWNER TO postgres;

--
-- Name: v_usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_usuarios_id_usuario_seq OWNER TO postgres;

--
-- Name: v_usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_usuarios_id_usuario_seq OWNED BY v_usuarios.id_usuario;


--
-- Name: vista_e_organizacion; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW vista_e_organizacion AS
 SELECT DISTINCT ON (e_organizacion.organizacion) e_organizacion.id_org,
    e_organizacion.id_tipo_org,
    e_organizacion.organizacion,
    e_organizacion.estatus
   FROM e_organizacion
  ORDER BY e_organizacion.organizacion;


ALTER TABLE public.vista_e_organizacion OWNER TO postgres;

--
-- Name: vista_e_organizacion3; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW vista_e_organizacion3 AS
 SELECT DISTINCT vista_e_organizacion.id_org,
    vista_e_organizacion.id_tipo_org,
    vista_e_organizacion.organizacion,
    vista_e_organizacion.estatus
   FROM vista_e_organizacion
  ORDER BY vista_e_organizacion.id_org;


ALTER TABLE public.vista_e_organizacion3 OWNER TO postgres;

--
-- Name: id_area; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_area_cadena ALTER COLUMN id_area SET DEFAULT nextval('e_area_cadena_id_area_seq'::regclass);


--
-- Name: id_cadena; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_cadena ALTER COLUMN id_cadena SET DEFAULT nextval('e_cadena_id_cadena_seq'::regclass);


--
-- Name: id_circuito; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_circuito ALTER COLUMN id_circuito SET DEFAULT nextval('e_circuito_id_circuito_seq'::regclass);


--
-- Name: id_eje; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_eje_parroquial ALTER COLUMN id_eje SET DEFAULT nextval('e_eje_parroquial_id_eje_seq'::regclass);


--
-- Name: id_ente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_ente_financiamiento ALTER COLUMN id_ente SET DEFAULT nextval('e_ente_financiamiento_id_ente_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_estado ALTER COLUMN id SET DEFAULT nextval('geo_estado_id_seq'::regclass);


--
-- Name: id_estatus; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_estatus_actividades ALTER COLUMN id_estatus SET DEFAULT nextval('e_estatus_actividades_id_estatus_seq'::regclass);


--
-- Name: id_estatus_financiamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_estatus_financiamiento ALTER COLUMN id_estatus_financiamiento SET DEFAULT nextval('e_estatus_financiamiento_id_estatus_financiamiento_seq'::regclass);


--
-- Name: id_figura; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_figura_juridica ALTER COLUMN id_figura SET DEFAULT nextval('e_figura_juridica_id_figura_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_municipio ALTER COLUMN id SET DEFAULT nextval('geo_municipio_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_parroquia ALTER COLUMN id SET DEFAULT nextval('geo_parroquia_id_seq'::regclass);


--
-- Name: id_perfil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_perfil_usuario ALTER COLUMN id_perfil SET DEFAULT nextval('e_perfil_usuario_id_perfil_seq'::regclass);


--
-- Name: id_tipo_org; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_tipo_organizacion ALTER COLUMN id_tipo_org SET DEFAULT nextval('e_tipo_organizacion_id_tipo_org_seq'::regclass);


--
-- Name: idUnidadTiempo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "e_unidades_Tiempo" ALTER COLUMN "idUnidadTiempo" SET DEFAULT nextval('"e_unidades_Tiempo_idUnidadTiempo_seq"'::regclass);


--
-- Name: id_actividad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_actividades ALTER COLUMN id_actividad SET DEFAULT nextval('v_actividades_id_actividad_seq'::regclass);


--
-- Name: id_financiamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_financiamiento ALTER COLUMN id_financiamiento SET DEFAULT nextval('v_financiamiento_id_financiamiento_seq'::regclass);


--
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_fotos_proyecto ALTER COLUMN id_registro SET DEFAULT nextval('v_fotos_proyecto_id_registro_seq'::regclass);


--
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_general ALTER COLUMN id_registro SET DEFAULT nextval('v_general_id_registro_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_historico_ingreso_exitoso ALTER COLUMN id SET DEFAULT nextval('v_historico_ingreso_exitoso_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_historico_ingreso_fallido ALTER COLUMN id SET DEFAULT nextval('v_historico_ingreso_fallido_id_seq'::regclass);


--
-- Name: id_inversion_fragmentada; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_inversion_fragmentada ALTER COLUMN id_inversion_fragmentada SET DEFAULT nextval('v_inversion_fragmentada_id_inversion_fragmentada_seq'::regclass);


--
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_org_comunitarias_sociales_vinculadas ALTER COLUMN id_registro SET DEFAULT nextval('v_org_comunitarias_sociales_vinculadas_id_registro_seq'::regclass);


--
-- Name: id_produccion_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_produccion_proyecto ALTER COLUMN id_produccion_proyecto SET DEFAULT nextval('v_produccion_proyecto_id_produccion_proyecto_seq'::regclass);


--
-- Name: id_productor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productor_proyecto ALTER COLUMN id_productor SET DEFAULT nextval('v_productor_proyecto_id_productor_seq'::regclass);


--
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productores ALTER COLUMN id_registro SET DEFAULT nextval('v_productores_id_registro_seq'::regclass);


--
-- Name: id_productor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productores_nuevo ALTER COLUMN id_productor SET DEFAULT nextval('v_productores_nuevo_id_productor_seq'::regclass);


--
-- Name: id_producto_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productos_proyecto ALTER COLUMN id_producto_proyecto SET DEFAULT nextval('v_productos_proyecto_id_producto_proyecto_seq'::regclass);


--
-- Name: id_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_proyecto ALTER COLUMN id_proyecto SET DEFAULT nextval('v_proyecto_id_proyecto_seq'::regclass);


--
-- Name: idRespproyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_responsables_proyectos ALTER COLUMN "idRespproyecto" SET DEFAULT nextval('"v_responsables_proyectos_idRespproyecto_seq"'::regclass);


--
-- Name: id_seguimiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_seguimiento_actividades ALTER COLUMN id_seguimiento SET DEFAULT nextval('v_seguimiento_actividades_id_seguimiento_seq'::regclass);


--
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_tipo_actividad_economica ALTER COLUMN id_registro SET DEFAULT nextval('v_tipo_actividad_economica_id_registro_seq'::regclass);


--
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_ubicacion_proyecto_georeferencial ALTER COLUMN id_registro SET DEFAULT nextval('v_ubicacion_proyecto_georeferencial_id_registro_seq'::regclass);


--
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('v_usuarios_id_usuario_seq'::regclass);


--
-- Name: e_area_cadena_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_area_cadena
    ADD CONSTRAINT e_area_cadena_pkey PRIMARY KEY (id_area);


--
-- Name: e_cadena_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_cadena
    ADD CONSTRAINT e_cadena_pkey PRIMARY KEY (id_cadena);


--
-- Name: e_circuito_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_circuito
    ADD CONSTRAINT e_circuito_pkey PRIMARY KEY (id_circuito);


--
-- Name: e_eje_parroquial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_eje_parroquial
    ADD CONSTRAINT e_eje_parroquial_pkey PRIMARY KEY (id_eje);


--
-- Name: e_ente_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_ente_financiamiento
    ADD CONSTRAINT e_ente_financiamiento_pkey PRIMARY KEY (id_ente);


--
-- Name: e_estatus_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_estatus_actividades
    ADD CONSTRAINT e_estatus_actividades_pkey PRIMARY KEY (id_estatus);


--
-- Name: e_estatus_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_estatus_financiamiento
    ADD CONSTRAINT e_estatus_financiamiento_pkey PRIMARY KEY (id_estatus_financiamiento);


--
-- Name: e_figura_juridica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_figura_juridica
    ADD CONSTRAINT e_figura_juridica_pkey PRIMARY KEY (id_figura);


--
-- Name: e_organizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_organizacion
    ADD CONSTRAINT e_organizacion_pkey PRIMARY KEY (id_org);


--
-- Name: e_parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_parroquia
    ADD CONSTRAINT e_parroquia_pkey PRIMARY KEY (id);


--
-- Name: e_perfil_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_perfil_usuario
    ADD CONSTRAINT e_perfil_usuario_pkey PRIMARY KEY (id_perfil);


--
-- Name: e_tipo_organizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_tipo_organizacion
    ADD CONSTRAINT e_tipo_organizacion_pkey PRIMARY KEY (id_tipo_org);


--
-- Name: e_unidades_Tiempo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "e_unidades_Tiempo"
    ADD CONSTRAINT "e_unidades_Tiempo_pkey" PRIMARY KEY ("idUnidadTiempo");


--
-- Name: pk_id_geo_estado; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_estado
    ADD CONSTRAINT pk_id_geo_estado PRIMARY KEY (id);


--
-- Name: pk_id_geo_municipio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_municipio
    ADD CONSTRAINT pk_id_geo_municipio PRIMARY KEY (id);


--
-- Name: v_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_actividades
    ADD CONSTRAINT v_actividades_pkey PRIMARY KEY (id_actividad);


--
-- Name: v_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_financiamiento
    ADD CONSTRAINT v_financiamiento_pkey PRIMARY KEY (id_financiamiento);


--
-- Name: v_fotos_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_fotos_proyecto
    ADD CONSTRAINT v_fotos_proyecto_pkey PRIMARY KEY (id_registro);


--
-- Name: v_general_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_general
    ADD CONSTRAINT v_general_pkey PRIMARY KEY (id_registro);


--
-- Name: v_historico_ingreso_exitoso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_historico_ingreso_exitoso
    ADD CONSTRAINT v_historico_ingreso_exitoso_pkey PRIMARY KEY (id);


--
-- Name: v_historico_ingreso_fallido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_historico_ingreso_fallido
    ADD CONSTRAINT v_historico_ingreso_fallido_pkey PRIMARY KEY (id);


--
-- Name: v_inversion_fragmentada_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_inversion_fragmentada
    ADD CONSTRAINT v_inversion_fragmentada_pkey PRIMARY KEY (id_inversion_fragmentada);


--
-- Name: v_org_comunitarias_sociales_vinculadas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_org_comunitarias_sociales_vinculadas
    ADD CONSTRAINT v_org_comunitarias_sociales_vinculadas_pkey PRIMARY KEY (id_registro);


--
-- Name: v_produccion_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_produccion_proyecto
    ADD CONSTRAINT v_produccion_proyecto_pkey PRIMARY KEY (id_produccion_proyecto);


--
-- Name: v_productor_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_productor_proyecto
    ADD CONSTRAINT v_productor_proyecto_pkey PRIMARY KEY (id_productor);


--
-- Name: v_productores_nuevo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_productores_nuevo
    ADD CONSTRAINT v_productores_nuevo_pkey PRIMARY KEY (id_productor);


--
-- Name: v_productores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_productores
    ADD CONSTRAINT v_productores_pkey PRIMARY KEY (id_registro);


--
-- Name: v_productos_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_productos_proyecto
    ADD CONSTRAINT v_productos_proyecto_pkey PRIMARY KEY (id_producto_proyecto);


--
-- Name: v_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_proyecto
    ADD CONSTRAINT v_proyecto_pkey PRIMARY KEY (id_proyecto);


--
-- Name: v_responsables_proyectos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_responsables_proyectos
    ADD CONSTRAINT v_responsables_proyectos_pkey PRIMARY KEY ("idRespproyecto");


--
-- Name: v_seguimiento_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_seguimiento_actividades
    ADD CONSTRAINT v_seguimiento_actividades_pkey PRIMARY KEY (id_seguimiento);


--
-- Name: v_tipo_actividad_economica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_tipo_actividad_economica
    ADD CONSTRAINT v_tipo_actividad_economica_pkey PRIMARY KEY (id_registro);


--
-- Name: v_ubicacion_proyecto_georeferencial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_ubicacion_proyecto_georeferencial
    ADD CONSTRAINT v_ubicacion_proyecto_georeferencial_pkey PRIMARY KEY (id_registro);


--
-- Name: v_usuarios_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_usuarios
    ADD CONSTRAINT v_usuarios_cedula_key UNIQUE (cedula, login);


--
-- Name: v_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_usuarios
    ADD CONSTRAINT v_usuarios_pkey PRIMARY KEY (id_usuario);


--
-- Name: dir_edo; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX dir_edo ON e_estado USING btree (texto);


--
-- Name: dir_mun; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX dir_mun ON e_municipio USING btree (texto);


--
-- Name: dir_par; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX dir_par ON e_parroquia USING btree (texto);


--
-- Name: e_area_cadena_id_cadena_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_area_cadena
    ADD CONSTRAINT e_area_cadena_id_cadena_fkey FOREIGN KEY (id_cadena) REFERENCES e_cadena(id_cadena);


--
-- Name: e_parroquia_id_geo_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_parroquia
    ADD CONSTRAINT e_parroquia_id_geo_municipio_fkey FOREIGN KEY (id_geo_municipio) REFERENCES e_municipio(id);


--
-- Name: fk_id_geo_estado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_municipio
    ADD CONSTRAINT fk_id_geo_estado FOREIGN KEY (id_geo_estado) REFERENCES e_estado(id);


--
-- Name: v_actividades_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_actividades
    ADD CONSTRAINT v_actividades_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_financiamiento_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_financiamiento
    ADD CONSTRAINT v_financiamiento_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_fotos_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_fotos_proyecto
    ADD CONSTRAINT v_fotos_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_general_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_general
    ADD CONSTRAINT v_general_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_inversion_fragmentada_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_inversion_fragmentada
    ADD CONSTRAINT v_inversion_fragmentada_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_org_comunitarias_sociales_vinculadas_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_org_comunitarias_sociales_vinculadas
    ADD CONSTRAINT v_org_comunitarias_sociales_vinculadas_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_produccion_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_produccion_proyecto
    ADD CONSTRAINT v_produccion_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_productor_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productor_proyecto
    ADD CONSTRAINT v_productor_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_productores_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productores
    ADD CONSTRAINT v_productores_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_productos_proyecto_id_produccion_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productos_proyecto
    ADD CONSTRAINT v_productos_proyecto_id_produccion_proyecto_fkey FOREIGN KEY (id_produccion_proyecto) REFERENCES v_produccion_proyecto(id_produccion_proyecto);


--
-- Name: v_seguimiento_actividades_id_actividad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_seguimiento_actividades
    ADD CONSTRAINT v_seguimiento_actividades_id_actividad_fkey FOREIGN KEY (id_actividad) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_tipo_actividad_economica_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_tipo_actividad_economica
    ADD CONSTRAINT v_tipo_actividad_economica_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: v_ubicacion_proyecto_georeferencial_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_ubicacion_proyecto_georeferencial
    ADD CONSTRAINT v_ubicacion_proyecto_georeferencial_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--


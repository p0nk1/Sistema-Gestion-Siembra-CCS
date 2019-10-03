--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: e_area_cadena; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_area_cadena (
    id_area integer NOT NULL,
    id_cadena integer,
    area character varying(150),
    estatus_area integer
);


ALTER TABLE public.e_area_cadena OWNER TO postgres;

--
-- Name: e_area_cadena_id_area_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_area_cadena_id_area_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_area_cadena_id_area_seq OWNER TO postgres;

--
-- Name: e_area_cadena_id_area_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_area_cadena_id_area_seq OWNED BY public.e_area_cadena.id_area;


--
-- Name: e_cadena; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_cadena (
    id_cadena integer NOT NULL,
    cadena character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_cadena OWNER TO postgres;

--
-- Name: e_cadena_id_cadena_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_cadena_id_cadena_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_cadena_id_cadena_seq OWNER TO postgres;

--
-- Name: e_cadena_id_cadena_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_cadena_id_cadena_seq OWNED BY public.e_cadena.id_cadena;


--
-- Name: e_circuito; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_circuito (
    id_circuito integer NOT NULL,
    id_municipio integer NOT NULL,
    circuito character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_circuito OWNER TO postgres;

--
-- Name: e_circuito_id_circuito_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_circuito_id_circuito_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_circuito_id_circuito_seq OWNER TO postgres;

--
-- Name: e_circuito_id_circuito_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_circuito_id_circuito_seq OWNED BY public.e_circuito.id_circuito;


--
-- Name: e_eje_parroquial; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_eje_parroquial (
    id_eje integer NOT NULL,
    id_parroquia integer NOT NULL,
    eje character varying(255) NOT NULL,
    estatus integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.e_eje_parroquial OWNER TO postgres;

--
-- Name: e_eje_parroquial_id_eje_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_eje_parroquial_id_eje_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_eje_parroquial_id_eje_seq OWNER TO postgres;

--
-- Name: e_eje_parroquial_id_eje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_eje_parroquial_id_eje_seq OWNED BY public.e_eje_parroquial.id_eje;


--
-- Name: e_ente_financiamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_ente_financiamiento (
    id_ente integer NOT NULL,
    ente character varying(100),
    estatus_tabla integer
);


ALTER TABLE public.e_ente_financiamiento OWNER TO postgres;

--
-- Name: e_ente_financiamiento_id_ente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_ente_financiamiento_id_ente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_ente_financiamiento_id_ente_seq OWNER TO postgres;

--
-- Name: e_ente_financiamiento_id_ente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_ente_financiamiento_id_ente_seq OWNED BY public.e_ente_financiamiento.id_ente;


--
-- Name: e_estado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_estado (
    id integer NOT NULL,
    texto character varying(60),
    latitud character varying(20),
    longitud character varying(20)
);


ALTER TABLE public.e_estado OWNER TO postgres;

--
-- Name: e_estatus_actividades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_estatus_actividades (
    id_estatus integer NOT NULL,
    estatus character varying(30),
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.e_estatus_actividades OWNER TO postgres;

--
-- Name: e_estatus_actividades_id_estatus_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_estatus_actividades_id_estatus_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_estatus_actividades_id_estatus_seq OWNER TO postgres;

--
-- Name: e_estatus_actividades_id_estatus_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_estatus_actividades_id_estatus_seq OWNED BY public.e_estatus_actividades.id_estatus;


--
-- Name: e_estatus_financiamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_estatus_financiamiento (
    id_estatus_financiamiento integer NOT NULL,
    estatus_financiamiento character varying(50),
    estatus_tabla integer
);


ALTER TABLE public.e_estatus_financiamiento OWNER TO postgres;

--
-- Name: e_estatus_financiamiento_id_estatus_financiamiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_estatus_financiamiento_id_estatus_financiamiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_estatus_financiamiento_id_estatus_financiamiento_seq OWNER TO postgres;

--
-- Name: e_estatus_financiamiento_id_estatus_financiamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_estatus_financiamiento_id_estatus_financiamiento_seq OWNED BY public.e_estatus_financiamiento.id_estatus_financiamiento;


--
-- Name: e_figura_juridica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_figura_juridica (
    id_figura integer NOT NULL,
    figura_juridica character varying(50),
    estatus_tabla integer
);


ALTER TABLE public.e_figura_juridica OWNER TO postgres;

--
-- Name: e_figura_juridica_id_figura_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_figura_juridica_id_figura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_figura_juridica_id_figura_seq OWNER TO postgres;

--
-- Name: e_figura_juridica_id_figura_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_figura_juridica_id_figura_seq OWNED BY public.e_figura_juridica.id_figura;


--
-- Name: e_municipio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_municipio (
    id integer NOT NULL,
    id_geo_estado integer,
    texto character varying(60),
    longitud character varying(20),
    latitud character varying(20)
);


ALTER TABLE public.e_municipio OWNER TO postgres;

--
-- Name: e_organizacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_organizacion (
    id_org integer NOT NULL,
    id_tipo_org integer NOT NULL,
    organizacion character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_organizacion OWNER TO postgres;

--
-- Name: e_parroquia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_parroquia (
    id integer NOT NULL,
    id_geo_municipio integer,
    texto character varying(60),
    latitud character varying(20),
    longitud character varying(20),
    id_circuito integer
);


ALTER TABLE public.e_parroquia OWNER TO postgres;

--
-- Name: e_perfil_usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_perfil_usuario (
    id_perfil integer NOT NULL,
    descripcion_perfil character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_perfil_usuario OWNER TO postgres;

--
-- Name: e_perfil_usuario_id_perfil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_perfil_usuario_id_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_perfil_usuario_id_perfil_seq OWNER TO postgres;

--
-- Name: e_perfil_usuario_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_perfil_usuario_id_perfil_seq OWNED BY public.e_perfil_usuario.id_perfil;


--
-- Name: e_tipo_organizacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.e_tipo_organizacion (
    id_tipo_org integer NOT NULL,
    tipo_org character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_tipo_organizacion OWNER TO postgres;

--
-- Name: e_tipo_organizacion_id_tipo_org_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.e_tipo_organizacion_id_tipo_org_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.e_tipo_organizacion_id_tipo_org_seq OWNER TO postgres;

--
-- Name: e_tipo_organizacion_id_tipo_org_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.e_tipo_organizacion_id_tipo_org_seq OWNED BY public.e_tipo_organizacion.id_tipo_org;


--
-- Name: e_unidades_Tiempo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."e_unidades_Tiempo" (
    "idUnidadTiempo" integer NOT NULL,
    "descUnidadTiempo" character varying(50) NOT NULL,
    "estatusUnidadTiempo" integer DEFAULT 1 NOT NULL
);


ALTER TABLE public."e_unidades_Tiempo" OWNER TO postgres;

--
-- Name: e_unidades_Tiempo_idUnidadTiempo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."e_unidades_Tiempo_idUnidadTiempo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."e_unidades_Tiempo_idUnidadTiempo_seq" OWNER TO postgres;

--
-- Name: e_unidades_Tiempo_idUnidadTiempo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."e_unidades_Tiempo_idUnidadTiempo_seq" OWNED BY public."e_unidades_Tiempo"."idUnidadTiempo";


--
-- Name: geo_estado_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.geo_estado_id_seq
    START WITH 25
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.geo_estado_id_seq OWNER TO postgres;

--
-- Name: geo_estado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.geo_estado_id_seq OWNED BY public.e_estado.id;


--
-- Name: geo_municipio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.geo_municipio_id_seq
    START WITH 336
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.geo_municipio_id_seq OWNER TO postgres;

--
-- Name: geo_municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.geo_municipio_id_seq OWNED BY public.e_municipio.id;


--
-- Name: geo_parroquia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.geo_parroquia_id_seq
    START WITH 1136
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.geo_parroquia_id_seq OWNER TO postgres;

--
-- Name: geo_parroquia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.geo_parroquia_id_seq OWNED BY public.e_parroquia.id;


--
-- Name: v_actividades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_actividades (
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

CREATE SEQUENCE public.v_actividades_id_actividad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_actividades_id_actividad_seq OWNER TO postgres;

--
-- Name: v_actividades_id_actividad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_actividades_id_actividad_seq OWNED BY public.v_actividades.id_actividad;


--
-- Name: v_financiamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_financiamiento (
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

CREATE SEQUENCE public.v_financiamiento_id_financiamiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_financiamiento_id_financiamiento_seq OWNER TO postgres;

--
-- Name: v_financiamiento_id_financiamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_financiamiento_id_financiamiento_seq OWNED BY public.v_financiamiento.id_financiamiento;


--
-- Name: v_fotos_proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_fotos_proyecto (
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

CREATE SEQUENCE public.v_fotos_proyecto_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_fotos_proyecto_id_registro_seq OWNER TO postgres;

--
-- Name: v_fotos_proyecto_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_fotos_proyecto_id_registro_seq OWNED BY public.v_fotos_proyecto.id_registro;


--
-- Name: v_general; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_general (
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

CREATE SEQUENCE public.v_general_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_general_id_registro_seq OWNER TO postgres;

--
-- Name: v_general_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_general_id_registro_seq OWNED BY public.v_general.id_registro;


--
-- Name: v_historico_ingreso_exitoso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_historico_ingreso_exitoso (
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

CREATE SEQUENCE public.v_historico_ingreso_exitoso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_historico_ingreso_exitoso_id_seq OWNER TO postgres;

--
-- Name: v_historico_ingreso_exitoso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_historico_ingreso_exitoso_id_seq OWNED BY public.v_historico_ingreso_exitoso.id;


--
-- Name: v_historico_ingreso_fallido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_historico_ingreso_fallido (
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

CREATE SEQUENCE public.v_historico_ingreso_fallido_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_historico_ingreso_fallido_id_seq OWNER TO postgres;

--
-- Name: v_historico_ingreso_fallido_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_historico_ingreso_fallido_id_seq OWNED BY public.v_historico_ingreso_fallido.id;


--
-- Name: v_inversion_fragmentada; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_inversion_fragmentada (
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

CREATE SEQUENCE public.v_inversion_fragmentada_id_inversion_fragmentada_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_inversion_fragmentada_id_inversion_fragmentada_seq OWNER TO postgres;

--
-- Name: v_inversion_fragmentada_id_inversion_fragmentada_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_inversion_fragmentada_id_inversion_fragmentada_seq OWNED BY public.v_inversion_fragmentada.id_inversion_fragmentada;


--
-- Name: v_org_comunitarias_sociales_vinculadas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_org_comunitarias_sociales_vinculadas (
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

CREATE SEQUENCE public.v_org_comunitarias_sociales_vinculadas_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_org_comunitarias_sociales_vinculadas_id_registro_seq OWNER TO postgres;

--
-- Name: v_org_comunitarias_sociales_vinculadas_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_org_comunitarias_sociales_vinculadas_id_registro_seq OWNED BY public.v_org_comunitarias_sociales_vinculadas.id_registro;


--
-- Name: v_organizacion_id_org_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.v_organizacion_id_org_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_organizacion_id_org_seq OWNER TO postgres;

--
-- Name: v_organizacion_id_org_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_organizacion_id_org_seq OWNED BY public.e_organizacion.id_org;


--
-- Name: v_produccion_proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_produccion_proyecto (
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

CREATE SEQUENCE public.v_produccion_proyecto_id_produccion_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_produccion_proyecto_id_produccion_proyecto_seq OWNER TO postgres;

--
-- Name: v_produccion_proyecto_id_produccion_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_produccion_proyecto_id_produccion_proyecto_seq OWNED BY public.v_produccion_proyecto.id_produccion_proyecto;


--
-- Name: v_productor_proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_productor_proyecto (
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

CREATE SEQUENCE public.v_productor_proyecto_id_productor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productor_proyecto_id_productor_seq OWNER TO postgres;

--
-- Name: v_productor_proyecto_id_productor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_productor_proyecto_id_productor_seq OWNED BY public.v_productor_proyecto.id_productor;


--
-- Name: v_productores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_productores (
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

CREATE SEQUENCE public.v_productores_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productores_id_registro_seq OWNER TO postgres;

--
-- Name: v_productores_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_productores_id_registro_seq OWNED BY public.v_productores.id_registro;


--
-- Name: v_productores_nuevo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_productores_nuevo (
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
    id_usuario_registro integer,
    id_proyecto integer
);


ALTER TABLE public.v_productores_nuevo OWNER TO postgres;

--
-- Name: v_productores_nuevo_id_productor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.v_productores_nuevo_id_productor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productores_nuevo_id_productor_seq OWNER TO postgres;

--
-- Name: v_productores_nuevo_id_productor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_productores_nuevo_id_productor_seq OWNED BY public.v_productores_nuevo.id_productor;


--
-- Name: v_productos_proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_productos_proyecto (
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

CREATE SEQUENCE public.v_productos_proyecto_id_producto_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_productos_proyecto_id_producto_proyecto_seq OWNER TO postgres;

--
-- Name: v_productos_proyecto_id_producto_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_productos_proyecto_id_producto_proyecto_seq OWNED BY public.v_productos_proyecto.id_producto_proyecto;


--
-- Name: v_proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_proyecto (
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

CREATE SEQUENCE public.v_proyecto_id_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_proyecto_id_proyecto_seq OWNER TO postgres;

--
-- Name: v_proyecto_id_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_proyecto_id_proyecto_seq OWNED BY public.v_proyecto.id_proyecto;


--
-- Name: v_responsables_proyectos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_responsables_proyectos (
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

CREATE SEQUENCE public."v_responsables_proyectos_idRespproyecto_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."v_responsables_proyectos_idRespproyecto_seq" OWNER TO postgres;

--
-- Name: v_responsables_proyectos_idRespproyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."v_responsables_proyectos_idRespproyecto_seq" OWNED BY public.v_responsables_proyectos."idRespproyecto";


--
-- Name: v_seguimiento_actividades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_seguimiento_actividades (
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

CREATE SEQUENCE public.v_seguimiento_actividades_id_seguimiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_seguimiento_actividades_id_seguimiento_seq OWNER TO postgres;

--
-- Name: v_seguimiento_actividades_id_seguimiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_seguimiento_actividades_id_seguimiento_seq OWNED BY public.v_seguimiento_actividades.id_seguimiento;


--
-- Name: v_tipo_actividad_economica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_tipo_actividad_economica (
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

CREATE SEQUENCE public.v_tipo_actividad_economica_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_tipo_actividad_economica_id_registro_seq OWNER TO postgres;

--
-- Name: v_tipo_actividad_economica_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_tipo_actividad_economica_id_registro_seq OWNED BY public.v_tipo_actividad_economica.id_registro;


--
-- Name: v_ubicacion_proyecto_georeferencial; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_ubicacion_proyecto_georeferencial (
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

CREATE SEQUENCE public.v_ubicacion_proyecto_georeferencial_id_registro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_ubicacion_proyecto_georeferencial_id_registro_seq OWNER TO postgres;

--
-- Name: v_ubicacion_proyecto_georeferencial_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_ubicacion_proyecto_georeferencial_id_registro_seq OWNED BY public.v_ubicacion_proyecto_georeferencial.id_registro;


--
-- Name: v_usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.v_usuarios (
    id_usuario integer NOT NULL,
    cedula integer NOT NULL,
    nombre_usuario character varying(50) NOT NULL,
    telefono_1 character varying(11) NOT NULL,
    telefono_2 character varying(11) NOT NULL,
    correo_electronico character varying(50) NOT NULL,
    login character varying(15) NOT NULL,
    password character varying(50) NOT NULL,
    fecha_registro timestamp without time zone NOT NULL,
    id_usuario_registra integer,
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

CREATE SEQUENCE public.v_usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_usuarios_id_usuario_seq OWNER TO postgres;

--
-- Name: v_usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.v_usuarios_id_usuario_seq OWNED BY public.v_usuarios.id_usuario;


--
-- Name: vista_e_organizacion; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vista_e_organizacion AS
 SELECT DISTINCT ON (e_organizacion.organizacion) e_organizacion.id_org,
    e_organizacion.id_tipo_org,
    e_organizacion.organizacion,
    e_organizacion.estatus
   FROM public.e_organizacion
  ORDER BY e_organizacion.organizacion;


ALTER TABLE public.vista_e_organizacion OWNER TO postgres;

--
-- Name: vista_e_organizacion3; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vista_e_organizacion3 AS
 SELECT DISTINCT vista_e_organizacion.id_org,
    vista_e_organizacion.id_tipo_org,
    vista_e_organizacion.organizacion,
    vista_e_organizacion.estatus
   FROM public.vista_e_organizacion
  ORDER BY vista_e_organizacion.id_org;


ALTER TABLE public.vista_e_organizacion3 OWNER TO postgres;

--
-- Name: e_area_cadena id_area; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_area_cadena ALTER COLUMN id_area SET DEFAULT nextval('public.e_area_cadena_id_area_seq'::regclass);


--
-- Name: e_cadena id_cadena; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_cadena ALTER COLUMN id_cadena SET DEFAULT nextval('public.e_cadena_id_cadena_seq'::regclass);


--
-- Name: e_circuito id_circuito; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_circuito ALTER COLUMN id_circuito SET DEFAULT nextval('public.e_circuito_id_circuito_seq'::regclass);


--
-- Name: e_eje_parroquial id_eje; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_eje_parroquial ALTER COLUMN id_eje SET DEFAULT nextval('public.e_eje_parroquial_id_eje_seq'::regclass);


--
-- Name: e_ente_financiamiento id_ente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_ente_financiamiento ALTER COLUMN id_ente SET DEFAULT nextval('public.e_ente_financiamiento_id_ente_seq'::regclass);


--
-- Name: e_estado id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_estado ALTER COLUMN id SET DEFAULT nextval('public.geo_estado_id_seq'::regclass);


--
-- Name: e_estatus_actividades id_estatus; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_estatus_actividades ALTER COLUMN id_estatus SET DEFAULT nextval('public.e_estatus_actividades_id_estatus_seq'::regclass);


--
-- Name: e_estatus_financiamiento id_estatus_financiamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_estatus_financiamiento ALTER COLUMN id_estatus_financiamiento SET DEFAULT nextval('public.e_estatus_financiamiento_id_estatus_financiamiento_seq'::regclass);


--
-- Name: e_figura_juridica id_figura; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_figura_juridica ALTER COLUMN id_figura SET DEFAULT nextval('public.e_figura_juridica_id_figura_seq'::regclass);


--
-- Name: e_municipio id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_municipio ALTER COLUMN id SET DEFAULT nextval('public.geo_municipio_id_seq'::regclass);


--
-- Name: e_parroquia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_parroquia ALTER COLUMN id SET DEFAULT nextval('public.geo_parroquia_id_seq'::regclass);


--
-- Name: e_perfil_usuario id_perfil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_perfil_usuario ALTER COLUMN id_perfil SET DEFAULT nextval('public.e_perfil_usuario_id_perfil_seq'::regclass);


--
-- Name: e_tipo_organizacion id_tipo_org; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_tipo_organizacion ALTER COLUMN id_tipo_org SET DEFAULT nextval('public.e_tipo_organizacion_id_tipo_org_seq'::regclass);


--
-- Name: e_unidades_Tiempo idUnidadTiempo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."e_unidades_Tiempo" ALTER COLUMN "idUnidadTiempo" SET DEFAULT nextval('public."e_unidades_Tiempo_idUnidadTiempo_seq"'::regclass);


--
-- Name: v_actividades id_actividad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_actividades ALTER COLUMN id_actividad SET DEFAULT nextval('public.v_actividades_id_actividad_seq'::regclass);


--
-- Name: v_financiamiento id_financiamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_financiamiento ALTER COLUMN id_financiamiento SET DEFAULT nextval('public.v_financiamiento_id_financiamiento_seq'::regclass);


--
-- Name: v_fotos_proyecto id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_fotos_proyecto ALTER COLUMN id_registro SET DEFAULT nextval('public.v_fotos_proyecto_id_registro_seq'::regclass);


--
-- Name: v_general id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_general ALTER COLUMN id_registro SET DEFAULT nextval('public.v_general_id_registro_seq'::regclass);


--
-- Name: v_historico_ingreso_exitoso id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_historico_ingreso_exitoso ALTER COLUMN id SET DEFAULT nextval('public.v_historico_ingreso_exitoso_id_seq'::regclass);


--
-- Name: v_historico_ingreso_fallido id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_historico_ingreso_fallido ALTER COLUMN id SET DEFAULT nextval('public.v_historico_ingreso_fallido_id_seq'::regclass);


--
-- Name: v_inversion_fragmentada id_inversion_fragmentada; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_inversion_fragmentada ALTER COLUMN id_inversion_fragmentada SET DEFAULT nextval('public.v_inversion_fragmentada_id_inversion_fragmentada_seq'::regclass);


--
-- Name: v_org_comunitarias_sociales_vinculadas id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_org_comunitarias_sociales_vinculadas ALTER COLUMN id_registro SET DEFAULT nextval('public.v_org_comunitarias_sociales_vinculadas_id_registro_seq'::regclass);


--
-- Name: v_produccion_proyecto id_produccion_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_produccion_proyecto ALTER COLUMN id_produccion_proyecto SET DEFAULT nextval('public.v_produccion_proyecto_id_produccion_proyecto_seq'::regclass);


--
-- Name: v_productor_proyecto id_productor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productor_proyecto ALTER COLUMN id_productor SET DEFAULT nextval('public.v_productor_proyecto_id_productor_seq'::regclass);


--
-- Name: v_productores id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productores ALTER COLUMN id_registro SET DEFAULT nextval('public.v_productores_id_registro_seq'::regclass);


--
-- Name: v_productores_nuevo id_productor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productores_nuevo ALTER COLUMN id_productor SET DEFAULT nextval('public.v_productores_nuevo_id_productor_seq'::regclass);


--
-- Name: v_productos_proyecto id_producto_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productos_proyecto ALTER COLUMN id_producto_proyecto SET DEFAULT nextval('public.v_productos_proyecto_id_producto_proyecto_seq'::regclass);


--
-- Name: v_proyecto id_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_proyecto ALTER COLUMN id_proyecto SET DEFAULT nextval('public.v_proyecto_id_proyecto_seq'::regclass);


--
-- Name: v_responsables_proyectos idRespproyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_responsables_proyectos ALTER COLUMN "idRespproyecto" SET DEFAULT nextval('public."v_responsables_proyectos_idRespproyecto_seq"'::regclass);


--
-- Name: v_seguimiento_actividades id_seguimiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_seguimiento_actividades ALTER COLUMN id_seguimiento SET DEFAULT nextval('public.v_seguimiento_actividades_id_seguimiento_seq'::regclass);


--
-- Name: v_tipo_actividad_economica id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_tipo_actividad_economica ALTER COLUMN id_registro SET DEFAULT nextval('public.v_tipo_actividad_economica_id_registro_seq'::regclass);


--
-- Name: v_ubicacion_proyecto_georeferencial id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_ubicacion_proyecto_georeferencial ALTER COLUMN id_registro SET DEFAULT nextval('public.v_ubicacion_proyecto_georeferencial_id_registro_seq'::regclass);


--
-- Name: v_usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.v_usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: e_area_cadena; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_area_cadena (id_area, id_cadena, area, estatus_area) FROM stdin;
2	1	Procesamiento de alimentos	1
1	1	Distribuci&oacute;n	1
3	1	Procesamiento de frutas	1
4	2	Herrer&iacute;a	1
6	2	Bloquera	1
7	2	Carpinter&iacute;a	1
8	7	Recreaci&oacute;n	1
9	7	Distribuci&oacute;n	1
11	7	Transporte	1
12	7	Funerar&iacute;a	1
10	7	Turismo	1
13	7	Desechos S&oacute;lidos	1
15	8	Abono	1
16	8	Av&iacute;cola	1
17	8	Siembra de Hortalizas	1
18	8	Siembra de Plantas Ornamentales	1
19	8	Piscicultura	1
20	8	Distribuci&oacute;n de Hortalizas	1
21	8	Siembra de Frutas	1
22	8	Siembra Organop&oacute;nica	1
23	10	Confecci&oacute;n Textil	1
24	11	Detergente	1
25	2	Distribuci&oacute;n	1
26	2	Servicios de la construcci&oacute;n	1
5	2	Producci&oacute;n	1
14	7	Mec&aacute;nica	1
28	1	Panaderia	1
27	7	Tecnolog&iacute;a	1
\.


--
-- Name: e_area_cadena_id_area_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_area_cadena_id_area_seq', 1, false);


--
-- Data for Name: e_cadena; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_cadena (id_cadena, cadena, estatus) FROM stdin;
3	Industrial	0
4	Mantenimiento	0
6	Textil	0
7	Servicios	1
1	Alimentaci&oacute;n	1
2	Construcci&oacute;n	1
5	Tecnol&oacute;gico	0
8	Agricultura Urbana	1
9	Artesania	1
10	Manufactura Textil, Calzados y Afines	1
11	Quimica	1
\.


--
-- Name: e_cadena_id_cadena_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_cadena_id_cadena_seq', 1, false);


--
-- Data for Name: e_circuito; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_circuito (id_circuito, id_municipio, circuito, estatus) FROM stdin;
1	104	Circuito 1	1
2	104	Circuito 2	1
3	104	Circuito 3	1
4	104	Circuito 4	1
5	104	Circuito 5	1
\.


--
-- Name: e_circuito_id_circuito_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_circuito_id_circuito_seq', 5, true);


--
-- Data for Name: e_eje_parroquial; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_eje_parroquial (id_eje, id_parroquia, eje, estatus) FROM stdin;
1	353	SUCRE 1	1
2	353	SUCRE 2	1
3	353	SUCRE 3	1
4	353	SUCRE 4	1
5	353	SUCRE 5	1
6	353	SUCRE 6	1
7	353	SUCRE 7	1
8	353	SUCRE 8	1
9	353	SUCRE 9	1
10	353	SUCRE 10	1
11	332	Sierra Maestra	1
12	348	Eje 1	1
13	348	Eje 2	1
14	341	Eje 5	1
15	345	Eje sur	1
16	345	Eje sur	1
17	347	Eje 2	1
19	342	Eje 1	1
20	334	La acequia	1
21	336	Eje 3	1
22	336	El onoto	1
23	340	Carretera Vieja Caracas-Los Teques	1
24	340	Sector Piedra Azul	1
25	334	Mamera-El Junquito	1
26	334	Exito Comunitario Socialista	1
27	346	Eje sur	1
28	351	Eje 4	1
29	344	Exito Comunitario Socialista	1
18	338	Eje 1	1
30	0	Todos	1
31	341	Eje 1	1
\.


--
-- Name: e_eje_parroquial_id_eje_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_eje_parroquial_id_eje_seq', 1, false);


--
-- Data for Name: e_ente_financiamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_ente_financiamiento (id_ente, ente, estatus_tabla) FROM stdin;
3	Gobierno del Distrito Capital	1
2	Consejo Federal de Gobierno	1
1	AlcaldÃ­a de Caracas	1
5	Ministerio del Poder Popular para las Comunas y ProtecciÃ³n Social	1
4	Fondo de CompensaciÃ³n Interterritorial	0
6	Inapymi	1
7	Safonacc	0
8	Fondas	1
\.


--
-- Name: e_ente_financiamiento_id_ente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_ente_financiamiento_id_ente_seq', 1, false);


--
-- Data for Name: e_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_estado (id, texto, latitud, longitud) FROM stdin;
1	ANZOATEGUI	10.13	-64.72
2	AMAZONAS	5.21	-66.23
3	APURE	7.6	-67.43
4	ARAGUA	10.33	-67.47
5	BARINAS	8.60	-70.25
6	DISTRITO CAPITAL	10.50	-66.90
7	FALCON	11.42	-69.68
8	GUARICO	9.45	-67.33
9	LARA	10.03	-69.34
10	MERIDA	8.59	-71.14
12	PORTUGUESA	9.05	-69.75
13	TACHIRA	7.792	-72.20
14	TRUJILLO	9.31	-70.60
15	VARGAS	10.59	-66.94
16	BOLIVAR	7.50	-64.43
17	CARABOBO	10.16	-67.98
18	COJEDES	9.64	-68.58
19	DELTA AMACURO	9.06	-62.05
20	MONAGAS	9.74	-63.18
22	SUCRE	10.47	-63.43
23	YARACUY	10.23	-68.70
24	ZULIA	9.85	-71.55
21	NUEVA ESPARTA	10.96	-64.02
11	MIRANDA	10.34	-67.02
\.


--
-- Data for Name: e_estatus_actividades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_estatus_actividades (id_estatus, estatus, estatus_tabla) FROM stdin;
\.


--
-- Name: e_estatus_actividades_id_estatus_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_estatus_actividades_id_estatus_seq', 1, false);


--
-- Data for Name: e_estatus_financiamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_estatus_financiamiento (id_estatus_financiamiento, estatus_financiamiento, estatus_tabla) FROM stdin;
1	Aprobado en espera de recursos	0
5	NO Financiado	1
3	IDEA Financiada	0
4	IDEA NO Financiada	0
2	Financiado	1
\.


--
-- Name: e_estatus_financiamiento_id_estatus_financiamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_estatus_financiamiento_id_estatus_financiamiento_seq', 1, true);


--
-- Data for Name: e_figura_juridica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_figura_juridica (id_figura, figura_juridica, estatus_tabla) FROM stdin;
2	Grupo de Intercambio Solidario y Trueque	1
3	Unidad Productiva Familiar	1
5	Empresa de Propiedad Social Indirecta Comunal	1
1	Empresa de Propiedad Social Directa Comuna	1
6	UPF - Unidad Productiva Familiar	1
4	AsociaciÃ³n Cooperativa	1
7	Firma Personal	1
8	C.A. - CompaÃ±Ã­a AnÃ³nima	1
9	S.A. - Sociedad AnÃ³nima	1
10	S.R.L. - Sociedad de Responsabilidad Limitada	1
\.


--
-- Name: e_figura_juridica_id_figura_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_figura_juridica_id_figura_seq', 2, true);


--
-- Data for Name: e_municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_municipio (id, id_geo_estado, texto, longitud, latitud) FROM stdin;
1	2	ALTO ORINOCO	-64.92	3,2
2	2	ATABAPO	-66.66	3,95
3	2	ATURES	-67.59	5,65
4	2	AUTANA	-66.97	4,8
5	2	MAROA	-67.28	2,87
6	2	MANAPIARE	-65.36	5,33
7	2	RÃO NEGRO	-65.65	1,64
8	1	ANACO	-64.46	9,43
9	1	ARAGUA	-64.83	9,46
10	1	FERNANDO DE PEÃ‘ALVER	-64.87	10,06
11	1	FRANCISCO DEL CARMEN CARVAJAL	-64.72	10,13
12	1	FRANCISCO DE MIRANDA	-64.31	8,79
13	1	GUANTA	-64.36	10,27
14	1	INDEPENDENCIA	-63.17	8,58
15	1	JUAN ANTONIO SOTILLO	-64.38	10,22
16	1	JUAN MANUEL CAJIGAL	-65.04	9,88
17	1	JOSÃ‰ GREGORIO MONAGAS	-65.22	8,44
18	1	LIBERTAD	-64.72	10,13
19	1	MANUEL EZEQUIEL BRUZUAL	-64.89	9,96
20	1	PEDRO MARÃA FREITES	-64.36	9,29
21	1	PÃRITU	-64.79	9,98
22	1	SAN JOSÃ‰ DE GUANIPA	-64.1	8,88
23	1	SAN JUAN DE CAPISTRANO	-65	10,04
24	1	SANTA ANA	-64.35	9,82
25	1	SIMÃ“N BOLÃVAR	-64.72	10,13
26	1	SIMÃ“N RODRÃGUEZ	-64.26	8,88
27	1	SIR ARTHUR MC GREGOR	-64.72	-64,72
28	1	DIEGO BAUTISTA URBANEJA	-64.59	10,17
29	3	ACHAGUAS	-68.31	7,6
30	3	BIRUACA	-67.3	7,75
31	3	MUÃ‘OZ	-68.93	7,37
32	3	PÃEZ	-70.71	7,19
33	3	PEDRO CAMEJO	-67.66	6,97
34	3	RÃ“MULO GALLEGOS	-69.32	6,71
35	3	SAN FERNANDO	-66.91	7,52
36	4	BOLÃVAR	-67.28	10,33
37	4	CAMATAGUA	-66.87	9,9
38	4	GIRARDOT	-67.58	10,46
39	4	JOSÃ‰ ANGEL LAMAS	-67.64	10,23
40	4	JOSÃ‰ FÃ‰LIX RIBAS	-67.58	10,18
41	4	JOSÃ‰ RAFAEL REVENGA	-67.56	10,23
42	4	LIBERTADOR	-67.61	10,2
43	4	MARIO BRICEÃ‘O IRAGORRY	-67.77	10,44
44	4	SAN CASIMIRO	-66.95	9,96
45	4	SAN SEBASTIÃN	-67.09	9,96
46	4	SANTIAGO MARIÃ‘O	-67.45	10,45
47	4	SANTOS MICHELENA	-67.47	10,33
48	4	SUCRE	-67.6	10,19
49	4	TOVAR	-67.37	10,45
50	4	URDANETA	-66.73	9,53
51	4	ZAMORA	-67.47	10,33
52	4	FRANCISCO LINARES ALCÃNTARA	-67.47	10,33
53	4	OCUMARE DE LA COSTA DE ORO	-67.47	10,33
54	5	ALBERTO ARVELO TORREALBA	-69.84	8,7
55	5	ANTONIO JOSÃ‰ DE SUCRE	-70.91	8,09
56	5	ARISMENDI	-68.25	8,23
57	5	BARINAS	-70.18	8,61
58	5	BOLÃVAR	-70.51	8,87
59	5	CRUZ PAREDES	-70.3	8,92
60	5	EZEQUIEL ZAMORA	-71.16	7,79
61	5	OBISPOS	-70.04	8,61
62	5	PEDRAZA	-70.35	8,29
63	5	ROJAS	-69.65	8,54
64	5	SOSA	-69.15	8,16
65	5	ANDRÃ‰S ELOY BLANCO	-70.25	8,6
66	16	CARONÃ	-62.9	8,16
67	16	CEDEÃ‘O	-66.55	6,55
68	16	EL CALLAO	-61.39	7,99
69	16	GRAN SABANA	-62.46	5,87
70	16	HERES	-63.54	8,05
71	16	PIAR	-62.38	7,92
72	16	RAÃšL LEONI	-64.05	5,61
73	16	ROSCIO	-61.94	7,77
74	16	SIFONTES	-61.04	7,68
75	16	SUCRE	-65.01	5,55
76	16	PADRE PEDRO CHIEN	-61.8	8,38
77	17	BEJUMA	-68.27	10,28
78	17	CARLOS ARVELO	-67.72	9,83
79	17	DIEGO IBARRA	-67.68	10,27
80	17	GUACARA	-67.89	10,24
81	17	JUAN JOSÃ‰ MORA	-68.21	10,36
82	17	LIBERTADOR	-67.95	9,74
83	17	LOS GUAYOS	-67.88	10,11
84	17	MIRANDA	-68.39	10,14
85	17	MONTALBÃN	-68.3	10,2
86	17	NAGUANAGUA	-68.15	10,23
87	17	PUERTO CABELLO	-67.99	10,37
88	17	SAN DIEGO	-68.39	10,14
89	17	SAN JOAQUÃN	-67.78	10,26
90	17	VALENCIA	-68	10,17
91	18	ANZOÃTEGUI	-68.7	9,57
92	18	FALCÃ“N	-68.3	9,9
93	18	GIRARDOT	-68.3	8,95
94	18	LIMA BLANCO	-68.49	9,83
95	18	PAO DE SAN JUAN BAUTISTA	-68	9,21
96	18	RICAURTE	-68.75	9,37
97	18	RÃ“MULO GALLEGOS	-68.55	9,45
98	18	SAN CARLOS	-68.58	9,65
99	18	TINACO	-68.34	9,44
100	19	ANTONIO DÃAZ	-61.23	8,93
101	19	CASACOIMA	-62.33	8,62
102	19	PEDERNALES	-62.17	9,81
103	19	TUCUPITA	-62.02	9,05
105	7	ACOSTA	-68.36	11,06
106	7	BOLÃVAR	-69.71	11,11
107	7	BUCHIVACOA	-70.76	11,12
108	7	CACIQUE MANAURE	-68.57	10,88
109	7	CARIRUBANA	-70.02	11,71
110	7	COLINA	-69.55	11,44
111	7	DABAJURO	-70.53	10,69
112	7	DEMOCRACIA	-70.23	10,76
113	7	FALCÃ“N	-70.01	12,06
114	7	FEDERACIÃ“N	-69.76	10,8
115	7	JACURA	-68.89	10,94
116	7	LOS TAQUES	-70.22	11,94
117	7	MAUROA	-71.01	10,9
118	7	MIRANDA	-69.9	11,37
119	7	MONSEÃ‘OR ITURRIZA	-68.3	10,93
120	7	PALMASOLA	-68.39	10,69
121	7	PETIT	-69.5	11,08
122	7	PÃRITU	-69.1	11,4
123	7	SAN FRANCISCO	-68.77	11,19
124	7	SILVA	-68.32	10,77
125	7	SUCRE	-69.91	11,18
126	7	TOCÃ“PERO	-69.27	11,52
127	7	UNIÃ“N	-69.31	10,78
128	7	URUMACO	-70.26	11,18
129	7	ZAMORA	-69.68	11,42
130	8	CAMAGUÃN	-67.48	8,28
131	8	CHAGUARAMAS	-66.22	9,49
132	8	EL SOCORRO	-65.61	9
133	8	SAN GERÃ“NIMO DE GUAYABAL	-66.74	7,8
134	8	LEONARDO INFANTE	-66	9,2
135	8	LAS MERCEDES	-66.48	8,54
136	8	JULIÃN MELLADO	-67.04	9,36
137	8	FRANCISCO DE MIRANDA	-67.4	8,9
138	8	JOSÃ‰ TADEO MONAGAS	-66.36	9,84
139	8	ORTIZ	-67.53	9,67
140	8	JOSÃ‰ FÃ‰LIX RIBAS	-65.68	9,35
141	8	JUAN GERMÃN ROSCIO	-67.33	9,88
142	8	SAN JOSÃ‰ DE GUARIBE	-65.73	9,76
143	8	SANTA MARÃA DE IPIRE	-65.23	8,59
144	8	PEDRO ZARAZA	-65.29	9,31
145	9	ANDRÃ‰S ELOY BLANCO	-69.45	9,65
146	9	CRESPO	-69.1	10,49
147	9	IRIBARREN	-69.34	10,06
148	9	JIMÃ‰NEZ	-69.62	9,9
149	9	MORÃN	-69.78	9,78
150	9	PALAVECINO	-69.24	10
151	9	SIMÃ“N PLANAS	-69.1	9,72
152	9	TORRES	-70.05	10,16
153	9	URDANETA	-69.58	10,59
154	10	ALBERTO ADRIANI	-71.63	8,61
155	10	ANDRÃ‰S BELLO	-71.4	8,68
156	10	ANTONIO PINTO SALINAS	-71.63	8,39
157	10	ARICAGUA	-71.14	8,21
158	10	ARZOBISPO CHACÃ“N	-71.33	8,13
159	10	CAMPO ELÃAS	-71.22	8,54
160	10	CARACCIOLO PARRA OLMEDO	-71.26	8,9
161	10	CARDENAL QUINTERO	-70.69	8,87
162	10	GUARAQUE	-71.74	8,16
163	10	JULIO CÃ‰SAR SALAS	-70.88	9,19
164	10	JUSTO BRICEÃ‘O	-70.94	9,04
165	10	LIBERTADOR	-71.14	8,57
166	10	MIRANDA	-70.83	9,08
167	10	OBISPO RAMOS DE LORA	-71.4	8,76
168	10	PADRE NOGUERA	-71.45	7,76
169	10	PUEBLO LLANO	-70.64	8,91
170	10	RANGEL	-70.92	8,75
171	10	RIVAS DÃVILA	-71.83	8,27
172	10	SANTOS MARQUINA	-71.07	8,63
173	10	SUCRE	-71.42	8,52
174	10	TOVAR	-71.75	8,33
175	10	TULIO FEBRES CORDERO	-71.06	9,12
176	10	ZEA	-71.77	8,37
177	11	ACEVEDO	-66.29	10,39
178	11	ANDRÃ‰S BELLO	-66.07	10,27
179	11	BARUTA	-66.85	10,46
180	11	BRIÃ“N	-66.1	10,47
181	11	BUROZ	-66.14	10,39
182	11	CARRIZAL	-66.96	10,37
183	11	CHACAO	-66.81	10,49
184	11	CRISTÃ“BAL ROJAS	-66.85	10,24
185	11	EL HATILLO	-66.82	10,42
186	11	GUAICAIPURO	-67.03	10,34
187	11	INDEPENDENCIA	-66.66	10,23
188	11	LANDER	-66.78	10,11
189	11	LOS SALIAS	-67.01	10,36
190	11	PÃEZ	-65.99	10,3
191	11	PAZ CASTILLO	-66.66	10,29
192	11	PEDRO GUAL	-65.54	10,1
193	11	PLAZA	-66.58	10,49
194	11	SIMÃ“N BOLÃVAR	-66.74	10,18
195	11	SUCRE	-66.65	10,5
196	11	URDANETA	-66.87	10,12
197	11	ZAMORA	-66.54	10,47
198	20	ACOSTA	-63.97	10,11
199	20	AGUASAY	-63.83	9,36
200	20	BOLÃVAR	-63.18	9,74
201	20	CARIPE	-63.5	10,16
202	20	CEDEÃ‘O	-63.86	9,9
203	20	EZEQUIEL ZAMORA	-63.95	9,61
204	20	LIBERTADOR	-62.59	9,01
205	20	MATURÃN	-63.18	9,73
206	20	PIAR	-63.49	9,97
207	20	PUNCERES	-63.18	10,03
208	20	SANTA BÃRBARA	-63.61	9,61
209	20	SOTILLO	-62.38	8,67
210	20	URACOA	-62.34	8,96
211	21	ANTOLÃN DEL CAMPO	-63.88	11,15
212	21	ARISMENDI	-63.85	11,03
213	21	DÃAZ	-64	10,95
214	21	GARCÃA	-63.91	10,93
215	21	GÃ“MEZ	-63.92	11,09
216	21	MANEIRO	-63.79	10,98
217	21	MARCANO	-63.94	11,06
218	21	MARIÃ‘O	-63.82	10,96
219	21	PENÃNSULA DE MACANAO	-64.34	11
220	21	TUBORES	-64.08	10,95
221	21	VILLALBA	-63.95	10,77
222	12	AGUA BLANCA	-69.1	9,72
223	12	ARAURE	-69.28	9,72
224	12	ESTELLER	-69.2	9,37
225	12	GUANARE	-69.74	9,03
226	12	GUANARITO	-68.82	8,39
227	12	MONSEÃ‘OR JOSÃ‰ VICENTE DE UNDA	-69.9	9,55
228	12	OSPINO	-69.46	9,29
229	12	PÃEZ	-69.21	9,55
230	12	PAPELÃ“N	-69.16	8,84
231	12	SAN GENARO DE BOCONOITO	-69.97	8,84
232	12	SAN RAFAEL DE ONOTO	-68.98	9,75
233	12	SANTA ROSALÃA	-68.88	8,87
234	12	SUCRE	-70.03	9,32
235	12	TURÃ‰N	-69.1	9,32
236	22	ANDRÃ‰S ELOY BLANCO	-63.29	10,29
237	22	ANDRÃ‰S MATA	-63.33	10,49
238	22	ARISMENDI	-63.1	10,68
239	22	BENÃTEZ	-63.06	10,4
240	22	BERMÃšDEZ	-63.24	10,66
241	22	BOLÃVAR	-64.02	10,36
242	22	CAJIGAL	-62.82	10,56
243	22	CRUZ SALMERÃ“N ACOSTA	-64.09	10,6
244	22	LIBERTADOR	-62.99	10,52
245	22	MARIÃ‘O	-62.57	10,56
246	22	MEJÃA	-63.69	10,33
247	22	MONTES	-63.55	10,48
248	22	RIBERO	-64.15	10,46
249	22	SUCRE	-63.49	10,47
250	22	VALDEZ	-62.26	10,59
251	13	ANDRÃ‰S BELLO	-72.2	7,85
252	13	ANTONIO RÃ“MULO COSTA	-72.13	8,17
253	13	AYACUCHO	-72.25	8,04
254	13	BOLÃVAR	-72.44	7,8
255	13	CÃRDENAS	-72.22	7,81
256	13	CÃ“RDOBA	-72.27	7,63
257	13	FERNÃNDEZ FEO	-71.91	7,49
258	13	FRANCISCO DE MIRANDA	-71.95	8,32
259	13	GARCÃA DE HEVIA	-72.24	8,21
260	13	GUÃSIMOS	-72.23	7,84
261	13	INDEPENDENCIA	-72.25	7,87
262	13	JÃUREGUI	-71.86	8,33
263	13	JOSÃ‰ MARÃA VARGAS	-72.07	8,1
264	13	JUNÃN	-72.35	7,68
265	13	LIBERTAD	-72.39	7,81
266	13	LIBERTADOR	-71.51	7,61
267	13	LOBATERA	-72.24	7,93
268	13	MICHELENA	-72.24	7,95
269	13	PANAMERICANO	-72.05	8,52
270	13	PEDRO MARÃA UREÃ‘A	-72.32	7,88
271	13	RAFAEL URDANETA	-72.42	7,49
272	13	SAMUEL DARÃO MALDONADO	-71.86	8,54
273	13	SAN CRISTÃ“BAL	-72.21	7,76
274	13	SEBORUCO	-72.06	8,13
275	13	SIMÃ“N RODRÃGUEZ	-71.8	8,42
276	13	SUCRE	-72.02	7,91
277	13	TORBES	-72.16	7,55
278	13	URIBANTE	-71.6	7,89
279	13	SAN JUDAS TADEO	-72.2	7,792
280	14	ANDRÃ‰S BELLO	-70.77	9,56
281	14	BOCONÃ“	-70.26	9,24
282	14	BOLÃVAR	-70.81	9,38
283	14	CANDELARIA	-70.34	9,62
284	14	CARACHE	-70.21	9,63
285	14	ESCUQUE	-70.67	9,3
286	14	JOSÃ‰ FELIPE MÃRQUEZ CAÃ‘IZALES	-70.51	9,79
287	14	JUAN VICENTE CAMPO ELÃAS	-70.12	9,37
288	14	LA CEIBA	-70.99	9,48
289	14	MIRANDA	-70.72	9,48
290	14	MONTE CARMELO	-70.84	9,17
291	14	MOTATÃN	-70.59	9,38
292	14	PAMPÃN	-70.47	9,44
293	14	PAMPANITO	-70.51	9,4
294	14	RAFAEL RANGEL	-70.73	9,37
295	14	SAN RAFAEL DE CARVAJAL	-70.58	9,35
296	14	SUCRE	-70.77	9,43
297	14	TRUJILLO	-70.43	9,37
298	14	URDANETA	-70.61	9,13
299	14	VALERA	-70.61	9,31
300	23	ARÃSTIDES BASTIDAS	-68.85	10,24
301	23	BOLÃVAR	-68.88	10,43
302	23	BRUZUAL	-68.89	10,15
303	23	COCOROTE	-68.78	10,24
304	23	INDEPENDENCIA	-68.77	10,28
305	23	JOSÃ‰ ANTONIO PÃEZ	-69	10,06
306	23	LA TRINIDAD	-68.81	10,2
307	23	MANUEL MONGE	-68.77	10,66
308	23	NIRGUA	-68.56	10,14
309	23	PEÃ‘A	-69.13	10,06
310	23	SAN FELIPE	-68.74	10,33
311	23	SUCRE	-68.84	10,27
312	23	URACHICHE	-69.01	10,15
313	23	VEROES	-68.61	10,44
314	15	VARGAS	-66.92	10,58
315	24	ALMIRANTE PADILLA	-71.65	11
316	24	BARALT	-71.06	9,86
317	24	CABIMAS	-71.46	10,41
318	24	CATATUMBO	-72.21	9,05
319	24	COLÃ“N	-71.88	9,02
320	24	FRANCISCO JAVIER PULGAR	-71.61	8,92
321	24	JESÃšS ENRIQUE LOSSADA	-72.22	10,69
322	24	JESÃšS MARÃA SEMPRÃšN	-72.74	9,24
323	24	LA CAÃ‘ADA DE URDANETA	-71.9	10,43
324	24	LAGUNILLAS	-71.24	10,13
325	24	MACHIQUES DE PERIJÃ	-72.53	10,04
326	24	MARA	-72.33	11,01
327	24	MARACAIBO	-71.61	10,63
328	24	MIRANDA	-71.27	10,85
329	24	PÃEZ	-72.03	11,37
330	24	ROSARIO DE PERIJÃ	-72.32	10,33
331	24	SAN FRANCISCO	-71.63	10,5
332	24	SANTA RITA	-71.47	10,5
333	24	SIMÃ“N BOLÃVAR	-71.29	10,18
334	24	SUCRE	-71.14	9,14
335	24	VALMORE RODRÃGUEZ	-71.21	10,03
104	6	LIBERTADOR	-66.9	10,5
\.


--
-- Data for Name: e_organizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_organizacion (id_org, id_tipo_org, organizacion, estatus) FROM stdin;
186	1	C.C.Tres Raices	1
1	1	Consejo Comunal Con La Uni&oacute;n La Nueva Esperanza. 	1
2	1	Consejo Comunal PÃ©rez Bonalde 	1
3	1	Cc Amanecer En El Resplandor 	1
4	1	Cc Unidad Bolivariana Liberal 5 	1
5	1	Cc Unidos Venceremos Km 11 	1
6	1	Consejo Comunal El Ca&ntilde;&oacute;n. 	1
7	1	Consejo Comunal Auyantepuy. 	1
8	1	Consejo Comunal Nueva Generaci&oacute;n. 	1
9	1	Consejo Comunal Bicentenario. 	1
10	1	Consejo Comunal Guaicaipuro I. 	1
11	1	Cc La Virgen Y El Manantial 	1
12	1	Las Abejas Del Panal 	1
13	1	Cc. Aquiles Nazoa 	1
14	1	Aguacatico 	1
15	1	Pelayo 	1
16	1	Panorama 	1
17	1	Santa Elena 	1
18	1	C.C. El Progreso 	1
19	1	Turmerito 	1
20	1	Cc Las Casitas Manuelita Saenz 	1
21	1	Cc. Zamora Parte Alta 	1
22	1	Cc El Despertar De Un Gigante Socialista 	1
23	1	Cc El Estanque 1 	1
25	1	Alberto Adriani 	1
27	1	Cc Antonio JosÃ© De Sucre 	1
28	1	Estrella Bolivariana 	1
29	1	C.C El Portillo 	1
30	1	Cc. Los Jardines 	1
31	1	C.C 19 De Abril 	1
32	1	C.C Nueva Imagen 	1
33	1	Consejo Comunal Nuestra Nueva Esperanza 	1
34	1	Cc. Altos De La Cruz 	1
35	1	Angelino 	1
36	1	Cc Andres Bello 	1
37	1	El Volcan 	1
38	1	C.C Triunfadore De Los Cangilones 	1
39	1	C.C. Cc2 	1
40	1	C.C 7 De Septiembre 	1
41	1	Consejo Comunal Sector Las Barras 	1
42	1	Parate Bueno 	1
43	1	C.C Claveles El Futuro 	1
44	1	C.C Francisco De Miranda 	1
45	1	Futuro De Sorocaima 	1
46	1	Somos Mas Que Vencedores 	1
47	1	Piedra Blanca 	1
48	1	Matanza Quebrada Seca 	1
49	1	Consejo Comunal De La Calle 3 	1
50	1	Paz Y Esperanza 	1
51	1	Bruzual Hacia El Progreso 	1
52	1	El Sanj&oacute;n De La Calle 12 	1
53	1	Vencedores De La Calle 18 	1
55	1	Visi&oacute;n Del Futuro Del Siglo Xxii 	1
56	1	La Octava Estrella Del Siglo Xxi 	1
57	1	Tierra De Jugo 	1
58	1	Evita Per&oacute;n 	1
59	1	Luchadores De La Quinta 	1
60	1	Luz De La Esperanza 	1
61	1	18 De Octubre 	1
62	1	Luchadores Del Topito 	1
63	1	Forjadores De Bruzual 	1
65	1	Renacer De Nuestra Tierra 	1
67	1	Unidos De Bruzual 	1
68	1	Venezuela Somos Todos 	1
69	1	El Progreso De La Laguna 	1
70	1	La Ensenada 	1
71	1	Enmanuel 	1
72	1	Comunidad De Bosque Verde 	1
73	1	Los Cocos 	1
74	1	La Recuperadora 	1
75	1	Vida y Progreso 	1
76	1	Guaicaipuro Uno 	1
77	1	Siete Proceres y Un Libertador 	1
78	1	El nuevo Despertar de los Cedros 	1
79	1	El Esfuerzo de Zamora 	1
80	1	Marcha 	1
81	1	Los Turpiales 	1
82	1	Los Luchadores de la SOS 	1
83	1	MÃ¡xima Expresi&oacute;n FloreÃ±a 	1
84	1	Consejo Comunal La Fila Sector Vista Al Mar 	1
85	1	Consejo Comunal La Voluntad 	1
86	1	Bolivariana Revolucionaria La Silsa 	1
87	2	Comuna De Perez Bonalde 	1
88	2	Comuna En Construcci&oacute;n Tres Ra&iacute;ces. 	1
89	2	Comuna En Construcci&oacute;n Casalta Iii. 	1
90	2	Comuna Construcci&oacute;n Guaicamacuto Bicentenario 	1
91	2	Comuna En Construcci&oacute;n Bolivariana Revolucionaria La Silsa. 	1
92	2	Comuna En Construcci&oacute;n Bicentenaria. 	1
93	2	Comuna En Construcci&oacute;n Socialista Fabricio Ojeda 	1
94	2	Comuna En Construcci&oacute;n Cacica Ana Soto 	1
95	2	Sierra Maetra 	1
96	2	Voces Revolucionarias 	1
97	2	El Panal 2021 	1
98	2	Comuna Voces Revolucionarias Sin Fronteras 	1
99	2	Comuna Antonio Jose De Sucre 	1
100	2	Comuna Juan 23 	1
101	2	Casco Central (Candelaria),Comuna La Tita (San JosÃ©) 	1
102	2	Comuna Amalivaca 	1
103	2	Comuna En Construcci&oacute;n Estrella Del Sur 	1
104	2	Manuel Ezequiel Bruzual 	1
105	2	Ali Primera 	1
106	2	Comuna Sim&oacute;n Bol&iacute;var 	1
107	2	Unidos Venceremos 	1
108	2	Maisanta 	1
109	2	La Veguita 	1
110	2	Luisa CÃ¡ceres De Arismendi 	1
111	2	Jose Felix Ribas 	1
112	2	Bolivar Y Rodriguez 	1
113	2	Un Paso Al Frente 	1
114	2	Renacer De Bolivar 	1
115	2	Ecologica La Hacienda Ud5 Ud6 	1
116	2	El Eden De Dios 	1
117	2	Juana Ramirez La Avanzadora 	1
118	2	Bicentenaria 	1
119	2	Unidad Y Fuerza Bolivariana 	1
121	2	Comuna Bicentenario 	1
122	2	SueÃ±o Revolucion 	1
199	1	Cc Unidos por Santa Rosa	1
123	2	Asociaci&oacute;n Cooperativa Banco De La Comuna Socialista Fabricio Ojeda R.L. 	1
26	1	Cc S&eacute;ptima Calle 	1
124	2	Los Magallanes De Catia,Sucre 8. 	1
125	2	Barrio Isa&iacute;as Medina ,Sector Tamanaco. 	1
126	2	5 De Julio 	1
127	2	Primera Calle El Mirador 	1
128	2	Las Abejas Del Panal 	1
129	2	Fundacion Montaraz 	1
130	2	Asociacion Civil Tinta Violeta 	1
131	2	Unidos Por Barrio Union 	1
132	2	E.P.S Multi Servicio San Juan 	1
133	2	Las Delicias 	1
134	2	Santa Rosa 	1
135	2	Brigadas Por Las Residencias Estudiantiles 	1
136	2	Frente Francisco De Miranda 	1
137	2	Cacique Guaicaipuro 	1
138	3	Asociaci&oacute;n Civil Para La Formaci&oacute;n Popular 	1
139	3	Asoc. Las Voces De San Pedro Iii 	1
140	3	Fundacion Negro Primero 	1
141	3	Asoc Civil Percusion Gutierrez 	1
142	3	Sala De Batalla Social Estrella De Sur 	1
143	3	El Esfuerzo De Zamora 	1
144	3	El Progreso De La Laguna 	1
145	3	Zamora 	1
146	3	Los Cedros 	1
147	3	Vencedores De Casco Central 	1
148	3	Vallecito 	1
149	3	Dos Virgen 	1
150	3	Ctu Piedra Azul 	1
151	3	La Comunidad Que Queremos 	1
152	3	Necesario Es Vencer 	1
153	3	Batalla De La Juventud 	1
154	3	Fuerza Y Valores Andres Bello 	1
155	3	Tres Raices 	1
156	3	Nueva Imagen Los Cangilones 	1
157	3	Uco 3334 	1
158	3	Fundacion Maestro Pueblo 	1
159	3	Unidos Por Nuestra Comunidad Santa Elena Coraz&oacute;n De Jesus 	1
160	3	Francisco De Miranda 	1
161	3	El Naranjal 	1
162	3	Brisas De Arismendi 	1
163	3	Unidos Por La Redoma Y El Refugio 	1
164	3	Unidad De Administraci&oacute;n Marcha 	1
165	3	Pedro Camejo 	1
166	3	Los Luchadores De Sosa 	1
167	3	Unidad De Administraci&oacute;n C.C Los Turpiales 	1
168	3	Los Depanos	1
169	3	SueÃ±o Revolucion	1
170	3	Asociaci&oacute;n Cooperativa Banco De La Comuna Socialista Fabricio Ojeda R.L. 	1
171	3	Los Magallanes de Catia, Sucre 8.	1
172	3	Barrio Isa&iacute;as Medina,Sector Tamanaco.	1
173	3	5 de Julio	1
174	3	Primera Calle El Mirador 	1
175	3	Las Abejas del Panal	1
176	3	Fundacion Montaraz	1
177	3	Asociacion civil tinta violeta 	1
178	3	Unidos por Barrio Union	1
179	3	E.P.S Multi Servicio San Juan	1
180	3	Las delicias 	1
182	3	Sala de Batalla	1
181	3	Santa Rosa	1
183	3	Brigadas por las Residencias Estudiantiles	1
184	3	Frente Francisco de Miranda	1
185	3	Cacique Guaicaipuro	1
24	1	Silvino P&eacute;rez 	1
187	1	Consejo Comunal Espada de Bolivar. 	1
188	1	Consejo Comunal Hacienda Julian LÃ³pez	1
189	1	Cc NiÃ±o Jesus	1
190	1	Cc Divino NiÃ±o	1
191	1	Cc Luchadores de la Silsa	1
192	1	Consejo Comunal Esperanza de Taperitas	1
193	1	Consejo Comunal De la Mano con la RevoluciÃ³n	1
194	1	Consejo Comunal Esperanza Revolucionaria	1
195	1	Consejo Comunal Unidos Venceremos	1
196	1	Consejo Comunal Sierra Maestra	1
197	1	Cc Amanecio de Golpe	1
198	1	Cc Santa Clara	1
200	1	Cc Todos por Rubira	1
201	1	Cc San Julian	1
202	1	Cc Pedro Gual	1
203	1	Cc El Mamon	1
204	1	Cc La Gran Parada	1
205	1	Cc Triunfadores	1
206	1	Cc Luz de San JosÃ©	1
207	1	Cc Menca	1
208	1	Cc Cruz Agachaito	1
209	1	Cc Colina de Vista Hermosa	1
210	1	Cc Alba Discomoda	1
211	1	Cc Vencedora de Garcia Carballo	1
212	1	Cc Juan XXIII	1
213	1	Cc Ali Primera	1
214	1	Cc Ceiba Parte Alta	1
215	1	Cc Mauro Perez Pumar	1
216	1	Cc Manos Unidas	1
217	1	Cc Juan Gonzales Parte Alta	1
218	1	Cc Sector 4 Maiba GÃ³mez	1
219	1	Cc Modulo Tanque MontaÃ±a	1
220	1	Cc Josefa Camejo	1
221	1	Cc SimÃ³n Bolivar	1
222	1	Cc Renacer	1
223	1	Cc Sector los Eucaliptos	1
224	1	Cc Sector el Manguito	1
225	1	Cc Sector Barrio Nuevo	1
226	1	Cc La Union de un Pueblo Socialista	1
227	1	Cc Calle la Paz	1
228	1	Cc Unidos por Nuestra Comunidad	1
229	1	Cc Hierbabuena	1
230	1	Cc Vision Socialista	1
231	1	Cc Alta PeÃ±a	1
232	1	Cc JosÃ© Felix Rivas	1
233	1	Cc Las Arismendi	1
234	1	Cc El Naranjal	1
235	1	Cc La Esperanza del Futuro	1
236	1	Cc Unidad del Pueblo	1
237	1	Cc Hacienda Mamora III	1
238	1	Cc Pedro Ortega Diaz	1
239	1	Cc Brisas de Arismendi	1
240	2	Comuna en construcci&oacute;n Exito Comunitario Socialista	1
\.


--
-- Data for Name: e_parroquia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_parroquia (id, id_geo_municipio, texto, latitud, longitud, id_circuito) FROM stdin;
2	1	HUACHAMACARE	0	0	0
334	104	ANTIMANO	10.467767000281528	-66.98540210723877	5
336	104	CARICUAO	10.4310920646329970	-66.97746276855469	5
341	104	EL RECREO	10.491356526140283	-66.87446594238281	3
343	104	LA PASTORA	10.512792317349962	-66.91995620727539	1
345	104	MACARAO	10.42611170522284	-67.03248023986816	5
347	104	SAN BERNARDINO	10.515492783982104	-66.90060138702393	3
348	104	SAN JOSE	10.520471707395778	-66.90781116485596	3
353	104	SUCRE	10.513847189939586	-66.93909645080566	1
306	97	ROMULO GALLEGOS	0	0	0
313	100	CURIAPO	0	0	0
332	104	23 DE ENERO	10.505703480079452	-66.93484783172607	2
333	104	ALTAGRACIA	10.51633667495992	-66.9127893447876	2
335	104	CANDELARIA	10.503678068123687	-66.90493583679199	3
337	104	CATEDRAL	10.506357516520978	-66.91450595855713	2
338	104	COCHE	10.45198338149956	-66.92519187927246	4
339	104	EL JUNQUITO	10.461394566327927	-67.0796012878418	1
340	104	EL PARAISO	10.492200483032397	-66.9261360168457	5
342	104	EL VALLE	10.468737624427312	-66.9063949584961	4
344	104	LA VEGA	10.460677131791362	-66.9422721862793	5
346	104	SAN AGUSTIN	10.496251444064102	-66.90570831298828	3
349	104	SAN JUAN	10.499964778395485	-66.93283081054688	2
350	104	SAN PEDRO	10.48392960624372	-66.88862800598145	3
351	104	SANTA ROSALIA	10.48198845008151	-66.91094398498535	4
352	104	SANTA TERESA	10.501320345298724	-66.91580951213837	2
3	1	LA ESMERALDA	0	0	0
4	1	MARAWAKA MAVACA	0	0	0
5	1	SIERRA PARIMA	0	0	0
6	2	CANAME	0	0	0
7	2	SAN FERNANDO DE ATABA	0	0	0
8	2	UCATA	0	0	0
9	2	YAPACANA	0	0	0
10	3	FERNANDO GIRON	0	0	0
11	3	TOVAR LUIS	0	0	0
12	3	ALBERTO GOMEZ	0	0	0
13	3	PARHUEÃ‘A	0	0	0
14	3	PLATANILLAL	0	0	0
15	4	GUAYAPO	0	0	0
16	4	ISLA DE RATON	0	0	0
17	4	MUNDUAPO	0	0	0
18	4	SAMARIAPO	0	0	0
19	4	SIPAPO	0	0	0
20	5	COMUNIDAD	0	0	0
21	5	MAROA	0	0	0
22	5	VICTORINO	0	0	0
23	6	ALTO VENTUARI	0	0	0
24	6	BAJO VENTUARI	0	0	0
25	6	MEDIO VENTUARI	0	0	0
26	6	SAN JUAN DE MANAPIARE	0	0	0
27	7	CASIQUIARE	0	0	0
28	7	COCUY	0	0	0
29	7	SAN CARLOS DE RIO NEG	0	0	0
30	7	SOLANO	0	0	0
31	8	ANACO	0	0	0
32	8	SAN JOAQUIN	0	0	0
33	9	ARAGUA DE BARCELONA	0	0	0
34	9	CACHIPO	0	0	0
35	10	PUERTO PIRITU	0	0	0
36	10	SAN MIGUEL	0	0	0
37	10	SUCRE	0	0	0
1067	326	LUIS DE VICENTE	0	0	0
1068	326	MONS.MARCOS SERGIO G	0	0	0
1069	326	RICAURTE	0	0	0
1070	326	SAN RAFAEL	0	0	0
1071	326	TAMARE	0	0	0
1072	327	ANTONIO BORJAS ROMERO	0	0	0
1073	327	BOLIVAR	0	0	0
1074	327	CACIQUE MARA	0	0	0
1075	327	CARACCIOLO PARRA PEREZ	0	0	0
1076	327	CECILIO ACOSTA	0	0	0
1077	327	CHIQUINQUIRA	0	0	0
1078	327	COQUIVACOA	0	0	0
1079	327	CRISTO DE ARANZA	0	0	0
1080	327	FRANCISCO EUGENIO B	0	0	0
1081	327	IDELFONZO VASQUEZ	0	0	0
1082	327	JUANA DE AVILA	0	0	0
1092	328	FARIA	0	0	0
38	12	ATAPIRIRE	0	0	0
39	12	BOCA DEL PAO	0	0	0
40	12	EL PAO	0	0	0
41	12	PARIAGUAN	0	0	0
42	13	CHORRERON	0	0	0
43	13	GUANTA	0	0	0
44	14	MAMO	0	0	0
45	14	SOLEDAD	0	0	0
46	15	CM. PUERTO LA CRUZ	0	0	0
47	15	POZUELOS	0	0	0
48	16	ONOTO	0	0	0
49	16	SAN PABLO	0	0	0
50	17	MAPIRE	0	0	0
51	17	PIAR	0	0	0
52	17	SANTA CLARA	0	0	0
53	17	SAN DIEGO DE CABRUTICA	0	0	0
54	17	UVERITO	0	0	0
55	17	ZUATA	0	0	0
56	18	EL CARITO	0	0	0
57	18	SAN MATEO	0	0	0
58	18	SANTA INES	0	0	0
59	19	CLARINES	0	0	0
60	19	GUANAPE	0	0	0
61	19	SABANA DE UCHIRE	0	0	0
62	20	CANTAURA	0	0	0
63	20	LIBERTADOR	0	0	0
64	20	SANTA ROSA	0	0	0
65	20	URICA	0	0	0
66	21	PIRITU	0	0	0
67	21	SAN FRANCISCO	0	0	0
68	22	SAN JOSE DE GUANIPA	0	0	0
69	23	BOCA DE CHAVEZ	0	0	0
70	23	BOCA UCHIRE	0	0	0
71	24	PUEBLO NUEVO	0	0	0
72	24	SANTA ANA	0	0	0
73	25	BERGANTIN	0	0	0
74	25	CAIGUA	0	0	0
75	25	EL CARMEN	0	0	0
76	25	EL PILAR	0	0	0
77	25	NARICUAL	0	0	0
78	25	SAN CRISTOBAL	0	0	0
79	26	EL TIGRE	0	0	0
80	27	EL CHAPARRO	0	0	0
81	27	TOMAS ALFARO CALATRAVA	0	0	0
82	28	EL MORRO	0	0	0
83	28	LECHERIAS	0	0	0
84	29	ACHAGUAS	0	0	0
85	29	APURITO	0	0	0
86	29	EL YAGUAL	0	0	0
87	29	GUACHARA	0	0	0
88	29	MUCURITAS	0	0	0
89	29	QUESERAS DEL MEDIO	0	0	0
90	30	BIRUACA	0	0	0
91	31	BRUZUAL	0	0	0
92	31	MANTECAL	0	0	0
93	31	QUINTERO	0	0	0
94	31	RINCON HONDO	0	0	0
95	31	SAN VICENTE	0	0	0
96	32	ARAMENDI	0	0	0
97	32	EL AMPARO	0	0	0
98	32	GUASDUALITO	0	0	0
99	32	SAN CAMILO	0	0	0
100	32	URDANETA	0	0	0
101	33	CODAZZI	0	0	0
102	33	CUNAVICHE	0	0	0
103	33	SAN JUAN DE PAYARA	0	0	0
104	34	ELORZA	0	0	0
105	34	LA TRINIDAD	0	0	0
106	35	EL RECREO	0	0	0
107	35	PEÃ‘ALVER	0	0	0
108	35	SAN FERNANDO	0	0	0
109	35	SAN RAFAEL DE ATAMAICA	0	0	0
110	36	SAN MATEO	0	0	0
111	37	CAMATAGUA	0	0	0
112	37	CARMEN DE CURA	0	0	0
113	38	ANDRES ELOY BLANCO	0	0	0
114	38	CHORONI	0	0	0
115	38	JOAQUIN CRESPO	0	0	0
116	38	JOSE CASANOVA GODOY	0	0	0
117	38	LAS DELICIAS	0	0	0
118	38	LOS TACARIGUAS	0	0	0
119	38	MADRE MARIA DE SAN JOSE	0	0	0
120	38	PEDRO JOSE OVALLES	0	0	0
121	39	SANTA CRUZ	0	0	0
122	40	CASTOR NIEVES RIOS	0	0	0
123	40	LAS GUACAMAYAS	0	0	0
124	40	LA VICTORIA	0	0	0
125	40	PAO DE ZARATE	0	0	0
126	40	ZUATA	0	0	0
127	41	EL CONSEJO	0	0	0
128	42	PALO NEGRO	0	0	0
129	42	SAN MARTIN DE PORRES	0	0	0
130	43	CAÃ‘A DE AZUCAR	0	0	0
131	43	EL LIMON	0	0	0
132	44	GUIRIPA	0	0	0
133	44	OLLAS DE CARAMACATE	0	0	0
134	44	SAN CASIMIRO	0	0	0
135	44	VALLE MORIN	0	0	0
136	45	SAN SEBASTIAN	0	0	0
137	46	ALFREDO PACHECO M	0	0	0
138	46	AREVALO APONTE	0	0	0
139	46	CHUAO	0	0	0
140	46	SAMAN DE GUERE	0	0	0
141	46	TURMERO	0	0	0
142	47	LAS TEJERIAS	0	0	0
143	47	TIARA	0	0	0
144	48	BELLA VISTA	0	0	0
145	48	CAGUA	0	0	0
146	49	COLONIA TOVAR	0	0	0
147	50	BARBACOAS	0	0	0
148	50	LAS PEÃ‘ITAS	0	0	0
149	50	SAN FRANCISCO DE CARA	0	0	0
150	50	TAGUAY	0	0	0
151	51	AUGUSTO MIJARES	0	0	0
152	51	MAGDALENO	0	0	0
153	51	SAN FRANCISCO DE ASIS	0	0	0
154	51	VALLES DE TUCUTUNEMO	0	0	0
155	51	VILLA DE CURA	0	0	0
156	52	FRANCISCO DE MIRANDA	0	0	0
157	52	MONS FELICIANO G	0	0	0
158	52	SANTA RITA	0	0	0
159	53	OCUMARE DE LA COSTA	0	0	0
160	54	RODRIGUEZ DOMINGUEZ	0	0	0
161	54	SABANETA	0	0	0
162	55	ANDRES BELLO	0	0	0
163	55	NICOLAS PULIDO	0	0	0
164	55	TICOPORO	0	0	0
165	56	ARISMENDI	0	0	0
166	56	GUADARRAMA	0	0	0
167	56	LA UNION	0	0	0
168	56	SAN ANTONIO	0	0	0
169	57	ALFREDO A LARRIVA	0	0	0
170	57	ALTO BARINAS	0	0	0
171	57	BARINAS	0	0	0
172	57	CORAZON DE JESUS	0	0	0
173	57	DOMINGA ORTIZ P	0	0	0
174	57	EL CARMEN	0	0	0
175	57	JUAN A RODRIGUEZ D	0	0	0
176	57	MANUEL P FAJARDO	0	0	0
177	57	RAMON I MENDEZ	0	0	0
178	57	ROMULO BETANCOURT	0	0	0
179	57	SAN SILVESTRE	0	0	0
180	57	SANTA INES	0	0	0
181	57	SANTA LUCIA	0	0	0
182	57	TORUNOS	0	0	0
183	58	ALTAMIRA	0	0	0
184	58	BARINITAS	0	0	0
185	58	CALDERAS	0	0	0
186	59	BARRANCAS	0	0	0
187	59	EL SOCORRO	0	0	0
188	59	MASPARRITO	0	0	0
189	60	JOSE IGNACIO DEL PUMAR	0	0	0
190	60	PEDRO BRICEÃ‘O MENDEZ	0	0	0
191	60	RAMON IGNACIO MENDEZ	0	0	0
192	60	SANTA BARBARA	0	0	0
193	61	EL REAL	0	0	0
194	61	LA LUZ	0	0	0
195	61	LOS GUASIMITOS	0	0	0
196	61	OBISPOS	0	0	0
197	62	CIUDAD BOLIVIA	0	0	0
198	62	IGNACIO BRICEÃ‘O	0	0	0
199	62	JOSE FELIX RIBAS	0	0	0
200	62	PAEZ	0	0	0
201	63	EL CANTON	0	0	0
202	63	PUERTO VIVAS	0	0	0
203	63	SANTA CRUZ DE GUACAS	0	0	0
204	64	CIUDAD DE NUTRIAS	0	0	0
205	64	EL REGALO	0	0	0
206	64	PUERTO DE NUTRIAS	0	0	0
207	64	SANTA CATALINA	0	0	0
208	65	EL CANTON	0	0	0
209	65	PUERTO VIVAS	0	0	0
210	65	SANTA CRUZ DE GUACAS	0	0	0
211	66	CACHAMAY	0	0	0
212	66	CHIRICA	0	0	0
213	66	DALLA COSTA	0	0	0
214	66	ONCE DE ABRIL	0	0	0
215	66	POZO VERDE	0	0	0
216	66	SIMON BOLIVAR	0	0	0
217	66	UNARE	0	0	0
218	66	UNIVERSIDAD	0	0	0
219	66	VISTA AL SOL	0	0	0
220	66	YOCOIMA	0	0	0
221	67	ALTAGRACIA	0	0	0
222	67	ASCENSION FARRERAS	0	0	0
223	67	CAICARA DEL ORINOCO	0	0	0
224	67	GUANIAMO, LA URBANA	0	0	0
225	67	GUANIAMO	0	0	0
226	67	LA URBANA	0	0	0
227	67	PIJIGUAOS	0	0	0
228	68	EL CALLAO	0	0	0
229	69	IKABARU	0	0	0
230	69	SANTA ELENA DE UAIREN	0	0	0
231	70	AGUA SALADA	0	0	0
232	70	CATEDRAL	0	0	0
233	70	JOSE ANTONIO PAEZ	0	0	0
234	70	LA SABANITA	0	0	0
235	70	MARHUANTA	0	0	0
236	70	ORINOCO	0	0	0
237	70	PANAPANA	0	0	0
238	70	VISTA HERMOSA	0	0	0
239	70	ZEA	0	0	0
240	71	ANDRES ELOY BLANCO	0	0	0
241	71	PEDRO COVA	0	0	0
242	71	UPATA	0	0	0
243	72	BARCELONETA	0	0	0
244	72	CIUDAD PIAR	0	0	0
245	72	SAN FRANCISCO	0	0	0
246	72	SANTA BARBARA	0	0	0
247	73	GUASIPATI	0	0	0
248	73	SALOM	0	0	0
249	74	DALLA COSTA	0	0	0
250	74	SAN ISIDRO	0	0	0
251	74	TUMEREMO	0	0	0
252	75	ARIPAO	0	0	0
253	75	GUARATARO	0	0	0
254	75	LAS MAJADAS	0	0	0
255	75	MARIPA	0	0	0
256	75	MOITACO	0	0	0
257	76	EL PALMAR	0	0	0
258	77	BEJUMA	0	0	0
259	77	CANOABO	0	0	0
260	77	SIMON BOLIVAR	0	0	0
261	78	BELEN	0	0	0
262	78	GUIGUE	0	0	0
263	78	TACARIGUA	0	0	0
264	79	AGUAS CALIENTES	0	0	0
265	79	MARIARA	0	0	0
266	80	CIUDAD ALIANZA	0	0	0
267	80	GUACARA	0	0	0
268	80	YAGUA	0	0	0
269	81	MORON	0	0	0
270	81	URAMA	0	0	0
271	82	U INDEPENDENCIA	0	0	0
272	82	U TOCUYITO	0	0	0
273	83	U LOS GUAYOS	0	0	0
274	84	MIRANDA	0	0	0
275	85	MONTALBAN	0	0	0
276	86	NAGUANAGUA	0	0	0
277	87	BARTOLOME SALOM	0	0	0
278	87	BORBURATA	0	0	0
279	87	DEMOCRACIA	0	0	0
280	87	FRATERNIDAD	0	0	0
281	87	GOAIGOAZA	0	0	0
282	87	JUAN JOSE FLORES	0	0	0
283	87	PATANEMO	0	0	0
284	87	UNION	0	0	0
285	88	URB SAN DIEGO	0	0	0
286	89	SAN JOAQUIN	0	0	0
287	90	CANDELARIA	0	0	0
288	90	CATEDRAL	0	0	0
289	90	EL SOCORRO	0	0	0
290	90	MIGUEL PEÃ‘A	0	0	0
291	90	NEGRO PRIMERO	0	0	0
292	90	RAFAEL URDANETA	0	0	0
293	90	SAN BLAS	0	0	0
294	90	SAN JOSE	0	0	0
295	90	SANTA ROSA	0	0	0
296	91	COJEDES	0	0	0
297	91	JUAN DE MATA SUAREZ	0	0	0
298	92	TINAQUILLO	0	0	0
299	93	EL BAUL	0	0	0
300	93	SUCRE	0	0	0
301	94	LA AGUADITA	0	0	0
302	94	MACAPO	0	0	0
303	95	EL PAO	0	0	0
304	96	EL AMPARO	0	0	0
305	96	LIBERTAD DE COJEDES	0	0	0
307	98	JUAN ANGEL BRAVO	0	0	0
308	98	MANUEL MANRIQUE	0	0	0
309	98	SAN CARLOS DE AUSTRIA	0	0	0
310	99	GRL/JEFE JOSE L SILVA	0	0	0
311	100	ALMIRANTE LUIS BRION	0	0	0
312	100	ANICETO LUGO	0	0	0
314	100	MANUEL RENAUD	0	0	0
315	100	PADRE BARRAL	0	0	0
316	100	SANTOS DE ABELGAS	0	0	0
317	101	5 DE JULIO	0	0	0
318	101	IMATACA	0	0	0
319	101	JUAN BAUTISTA ARISMEN	0	0	0
320	101	MANUEL PIAR	0	0	0
321	101	ROMULO GALLEGOS	0	0	0
322	102	LUIS B PRIETO FIGUERO	0	0	0
323	102	PEDERNALES	0	0	0
324	103	JOSE VIDAL MARCANO	0	0	0
325	103	JUAN MILLAN	0	0	0
326	103	LEONARDO RUIZ PINEDA	0	0	0
327	103	MCL.ANTONIO J DE SUCRE	0	0	0
328	103	MONS. ARGIMIRO GARCIA	0	0	0
329	103	SAN JOSE	0	0	0
330	103	SAN RAFAEL	0	0	0
331	103	VIRGEN DEL VALLE	0	0	0
354	105	CAPADARE	0	0	0
355	105	LA PASTORA	0	0	0
356	105	LIBERTADOR	0	0	0
357	105	SAN JUAN DE LOS CAYOS	0	0	0
358	106	ARACUA	0	0	0
359	106	LA PEÃ‘A	0	0	0
360	106	SAN LUIS	0	0	0
361	107	BARIRO	0	0	0
362	107	BOROJO	0	0	0
363	107	CAPATARIDA	0	0	0
364	107	GUAJIRO	0	0	0
365	107	SEQUE	0	0	0
366	107	ZAZARIDA	0	0	0
367	108	YARACAL	0	0	0
368	109	CARIRUBANA	0	0	0
369	109	NORTE	0	0	0
370	109	PUNTA CARDON	0	0	0
371	109	SANTA ANA	0	0	0
372	110	ACURIGUA	0	0	0
373	110	GUAIBACOA	0	0	0
374	110	LA VELA DE CORO	0	0	0
375	110	LAS CALDERAS	0	0	0
376	110	MACORUCA	0	0	0
377	111	DABAJURO	0	0	0
378	112	AGUA CLARA	0	0	0
379	112	AVARIA	0	0	0
380	112	PEDREGAL	0	0	0
381	112	PIEDRA GRANDE	0	0	0
382	112	PURURECHE	0	0	0
383	113	ADAURE	0	0	0
384	113	ADICORA	0	0	0
385	113	BARAIVED	0	0	0
386	113	BUENA VISTA	0	0	0
387	113	EL HATO	0	0	0
388	113	EL VINCULO	0	0	0
389	113	JADACAQUIVA	0	0	0
390	113	MORUY	0	0	0
391	113	PUEBLO NUEVO	0	0	0
392	114	AGUA LARGA	0	0	0
393	114	CHURUGUARA	0	0	0
394	114	EL PAUJI	0	0	0
395	114	INDEPENDENCIA	0	0	0
396	114	MAPARARI	0	0	0
397	115	AGUA LINDA	0	0	0
398	115	ARAURIMA	0	0	0
399	115	JACURA	0	0	0
400	116	JUDIBANA	0	0	0
401	116	LOS TAQUES	0	0	0
402	117	CASIGUA	0	0	0
403	117	MENE DE MAUROA	0	0	0
404	117	SAN FELIX	0	0	0
405	118	GUZMAN GUILLERMO	0	0	0
406	118	MITARE	0	0	0
407	118	RIO SECO	0	0	0
408	118	SABANETA	0	0	0
409	118	SAN ANTONIO	0	0	0
410	118	SAN GABRIEL	0	0	0
411	118	SANTA ANA	0	0	0
412	119	BOCA DE TOCUYO	0	0	0
413	119	CHICHIRIVICHE	0	0	0
414	119	TOCUYO DE LA COSTA	0	0	0
415	120	PALMA SOLA	0	0	0
416	121	CABURE	0	0	0
417	121	COLINA	0	0	0
418	121	CURIMAGUA	0	0	0
419	122	PIRITU	0	0	0
420	122	SAN JOSE DE LA COSTA	0	0	0
421	123	MIRIMIRE	0	0	0
422	124	BOCA DE AROA	0	0	0
423	124	TUCACAS	0	0	0
424	125	PECAYA	0	0	0
425	125	SUCRE	0	0	0
426	126	TOCOPERO	0	0	0
427	127	EL CHARAL	0	0	0
428	127	LAS VEGAS DEL TUY	0	0	0
429	127	STA.CRUZ DE BUCARAL	0	0	0
430	128	BRUZUAL	0	0	0
431	128	URUMACO	0	0	0
432	129	LA CIENAGA	0	0	0
433	129	LA SOLEDAD	0	0	0
434	129	PUEBLO CUMAREBO	0	0	0
435	129	ZAZARIDA	0	0	0
436	130	CAMAGUAN	0	0	0
437	130	PUERTO MIRANDA	0	0	0
438	130	UVERITO	0	0	0
439	131	CHAGUARAMAS	0	0	0
440	132	EL SOCORRO	0	0	0
441	133	CAZORLA	0	0	0
442	133	GUAYABAL	0	0	0
443	134	ESPINO	0	0	0
444	134	VALLE DE LA PASCUA	0	0	0
445	135	CABRUTA	0	0	0
446	135	LAS MERCEDES	0	0	0
447	135	STA RITA DE MANAPIRE	0	0	0
448	136	EL SOMBRERO	0	0	0
449	136	SOSA	0	0	0
450	137	CALABOZO	0	0	0
451	137	EL CALVARIO	0	0	0
452	137	EL RASTRO	0	0	0
453	137	GUARDATINAJAS	0	0	0
454	138	ALTAGRACIA DE ORITUCO	0	0	0
455	138	LEZAMA	0	0	0
456	138	LIBERTAD DE ORITUCO	0	0	0
457	138	PASO REAL DE MACAIRA	0	0	0
458	138	SAN FCO DE MACAIRA	0	0	0
459	138	SAN FCO DE MACAIRA	0	0	0
460	138	SAN RAFAEL DE ORITUCO	0	0	0
461	138	SOUBLETTE	0	0	0
462	139	ORTIZ	0	0	0
463	139	SAN LORENZO DE TIZNADOS	0	0	0
464	139	SAN FCO. DE TIZNADOS	0	0	0
465	139	SAN JOSE DE TIZNADOS	0	0	0
466	140	SAN RAFAEL DE LAYA	0	0	0
467	140	TUCUPIDO	0	0	0
468	141	CANTAGALLO	0	0	0
469	141	PARAPARA	0	0	0
470	141	SAN JUAN DE LOS MORROS	0	0	0
471	142	SAN JOSE DE GUARIBE	0	0	0
472	143	ALTAMIRA	0	0	0
473	143	SANTA MARIA DE IPIRE	0	0	0
474	144	SAN JOSE DE UNARE	0	0	0
475	144	ZARAZA	0	0	0
476	145	PIO TAMAYO	0	0	0
477	145	QBDA. HONDA DE GUACHE	0	0	0
478	145	YACAMBU	0	0	0
479	146	FREITEZ	0	0	0
480	146	JOSE MARIA BLANCO	0	0	0
481	147	AGUEDO F. ALVARADO	0	0	0
482	147	BUENA VISTA	0	0	0
483	147	CATEDRAL	0	0	0
484	147	EL CUJI	0	0	0
485	147	JUAN DE VILLEGAS	0	0	0
486	147	JUAREZ	0	0	0
487	147	LA CONCEPCION	0	0	0
488	147	SANTA ROSA	0	0	0
489	147	TAMACA	0	0	0
490	147	UNION	0	0	0
491	148	CRNEL. MARIANO PERAZA	0	0	0
492	148	CUARA	0	0	0
493	148	DIEGO DE LOZADA	0	0	0
494	148	JOSE BERNARDO DORANTE	0	0	0
495	148	JUAN B RODRIGUEZ	0	0	0
496	148	PARAISO DE SAN JOSE	0	0	0
497	148	SAN MIGUEL	0	0	0
498	148	TINTORERO	0	0	0
499	149	ANZOATEGUI	0	0	0
500	149	BOLIVAR	0	0	0
501	149	GUARICO	0	0	0
502	149	HILARIO LUNA Y LUNA	0	0	0
503	149	HUMOCARO ALTO	0	0	0
504	149	HUMOCARO BAJO	0	0	0
505	149	LA CANDELARIA	0	0	0
506	149	MORAN	0	0	0
507	150	AGUA VIVA	0	0	0
508	150	CABUDARE	0	0	0
509	150	JOSE G. BASTIDAS	0	0	0
510	151	BURIA	0	0	0
511	151	GUSTAVO VEGAS LEON	0	0	0
512	151	SARARE	0	0	0
513	152	ALTAGRACIA	0	0	0
514	152	ANTONIO DIAZ	0	0	0
515	152	CAMACARO	0	0	0
516	152	CASTAÃ‘EDA	0	0	0
517	152	CECILIO ZUBILLAGA	0	0	0
518	152	CHIQUINQUIRA	0	0	0
519	152	EL BLANCO	0	0	0
520	152	ESPINOZA LOS MONTEROS	0	0	0
521	152	HERIBERTO ARROYO	0	0	0
522	152	LARA	0	0	0
523	152	LAS MERCEDES	0	0	0
524	152	MANUEL MORILLO	0	0	0
525	152	MONTA A VERDE	0	0	0
526	152	MONTES DE OCA	0	0	0
527	152	REYES VARGAS TORRES	0	0	0
528	152	TRINIDAD SAMUEL	0	0	0
529	153	MOROTURO	0	0	0
530	153	SAN MIGUEL	0	0	0
531	153	SIQUISIQUE	0	0	0
532	153	XAGUAS	0	0	0
533	154	GABRIEL PICON G.	0	0	0
534	154	HECTOR AMABLE MORA	0	0	0
535	154	JOSE NUCETE SARDI	0	0	0
536	154	PRESIDENTE BETANCOURT	0	0	0
537	154	PRESIDENTE PAEZ	0	0	0
538	154	PTE. ROMULO GALLEGOS	0	0	0
539	154	PULIDO MENDEZ	0	0	0
540	155	LA AZULITA	0	0	0
541	156	MESA BOLIVAR	0	0	0
542	156	MESA DE LAS PALMAS	0	0	0
543	156	STA CRUZ DE MORA	0	0	0
544	157	ARICAGUA	0	0	0
545	157	SAN ANTONIO	0	0	0
546	158	CANAGUA	0	0	0
547	158	CAPURI	0	0	0
548	158	CHACANTA	0	0	0
549	158	EL MOLINO	0	0	0
550	158	GUAIMARAL	0	0	0
551	158	MUCUCHACHI	0	0	0
552	158	MUCUTUY	0	0	0
553	159	ACEQUIAS	0	0	0
554	159	FERNANDEZ PEÃ‘A	0	0	0
555	159	JAJI	0	0	0
556	159	LA MESA	0	0	0
557	159	MATRIZ	0	0	0
558	159	MONTALBAN	0	0	0
559	159	SAN JOSE	0	0	0
560	160	FLORENCIO RAMIREZ	0	0	0
561	160	TUCANI	0	0	0
562	161	LAS PIEDRAS	0	0	0
563	161	SANTO DOMINGO	0	0	0
564	162	GUARAQUE	0	0	0
565	162	MESA DE QUINTERO	0	0	0
566	162	RIO NEGRO	0	0	0
567	163	ARAPUEY	0	0	0
568	163	PALMIRA	0	0	0
569	164	SAN CRISTOBAL DE T	0	0	0
570	164	TORONDOY	0	0	0
571	165	ANTONIO SPINETTI DINI	0	0	0
572	165	ARIAS	0	0	0
573	165	CARACCIOLO PARRA P	0	0	0
574	165	DOMINGO PEÃ‘A	0	0	0
575	165	EL LLANO	0	0	0
576	165	EL MORRO	0	0	0
577	165	GONZALO PICON FEBRES	0	0	0
578	165	JACINTO PLAZA	0	0	0
579	165	JUAN RODRIGUEZ SUAREZ	0	0	0
580	165	LASSO DE LA VEGA	0	0	0
581	165	LOS NEVADOS	0	0	0
582	165	MARIANO PICON SALAS	0	0	0
583	165	MILLA	0	0	0
584	165	OSUNA RODRIGUEZ	0	0	0
585	165	SAGRARIO	0	0	0
586	166	ANDRES ELOY BLANCO	0	0	0
587	166	LA VENTA	0	0	0
588	166	PIÃ‘ANGO	0	0	0
589	166	TIMOTES	0	0	0
590	167	ELOY PAREDES	0	0	0
591	167	R DE ALCAZAR	0	0	0
592	167	STA ELENA DE ARENALES	0	0	0
593	168	STA MARIA DE CAPARO	0	0	0
594	169	PUEBLO LLANO	0	0	0
595	170	CACUTE	0	0	0
596	170	LA TOMA	0	0	0
597	170	MUCUCHIES	0	0	0
598	170	MUCURUBA	0	0	0
599	170	SAN RAFAEL	0	0	0
600	171	BAILADORES	0	0	0
601	171	GERONIMO MALDONADO	0	0	0
602	172	TABAY	0	0	0
603	173	CHIGUARA	0	0	0
604	173	ESTANQUES	0	0	0
605	173	LAGUNILLAS	0	0	0
606	173	LA TRAMPA	0	0	0
607	173	PUEBLO NUEVO DEL SUR	0	0	0
608	173	SAN JUAN	0	0	0
609	174	EL AMPARO	0	0	0
610	174	EL LLANO	0	0	0
611	174	SAN FRANCISCO	0	0	0
612	174	TOVAR	0	0	0
613	175	INDEPENDENCIA	0	0	0
614	175	MARIA C PALACIOS	0	0	0
615	175	NUEVA BOLIVIA	0	0	0
616	175	SANTA APOLONIA	0	0	0
617	176	CAÃ‘O EL TIGRE	0	0	0
618	176	ZEA	0	0	0
619	177	ARAGUITA	0	0	0
620	177	AREVALO GONZALEZ	0	0	0
621	177	CAPAYA	0	0	0
622	177	CAUCAGUA	0	0	0
623	177	EL CAFE	0	0	0
624	177	MARIZAPA	0	0	0
625	177	PANAQUIRE	0	0	0
626	177	RIBAS	0	0	0
627	178	CUMBO	0	0	0
628	178	SAN JOSE DE BARLOVENTO	0	0	0
629	179	BARUTA	0	0	0
630	179	EL CAFETAL	0	0	0
631	179	LAS MINAS DE BARUTA	0	0	0
632	180	CURIEPE	0	0	0
633	180	HIGUEROTE	0	0	0
634	180	TACARIGUA	0	0	0
635	181	MAMPORAL	0	0	0
636	182	CARRIZAL	0	0	0
637	183	CHACAO	0	0	0
638	184	CHARALLAVE	0	0	0
639	184	LAS BRISAS	0	0	0
640	185	EL HATILLO	0	0	0
641	186	ALTAGRACIA DE LA M	0	0	0
642	186	CECILIO ACOSTA	0	0	0
643	186	EL JARILLO	0	0	0
644	186	LOS TEQUES	0	0	0
645	186	PARACOTOS	0	0	0
646	186	SAN PEDRO	0	0	0
647	186	TACATA	0	0	0
648	187	EL CARTANAL	0	0	0
649	187	STA TERESA DEL TUY	0	0	0
650	188	LA DEMOCRACIA	0	0	0
651	188	OCUMARE DEL TUY	0	0	0
652	188	SANTA BARBARA	0	0	0
653	189	SAN ANTONIO LOS ALTOS	0	0	0
654	190	EL GUAPO	0	0	0
655	190	PAPARO	0	0	0
656	190	RIO CHICO	0	0	0
657	190	SAN FERNANDO DEL GUAPO	0	0	0
658	190	TACARIGUA DE LA LAGUNA	0	0	0
659	191	SANTA LUCIA	0	0	0
660	192	CUPIRA	0	0	0
661	192	MACHURUCUTO	0	0	0
662	193	GUARENAS	0	0	0
663	194	SAN FCO DE YARE	0	0	0
664	194	SAN ANTONIO DE YARE	0	0	0
665	195	CAUCAGUITA	0	0	0
666	195	FILAS DE MARICHES	0	0	0
667	195	LA DOLORITA	0	0	0
668	195	LEONCIO MARTINEZ	0	0	0
669	195	PETARE	0	0	0
670	196	CUA NUEVA	0	0	0
671	196	CUA	0	0	0
672	197	BOLIVAR	0	0	0
673	197	GUATIRE	0	0	0
674	198	SAN ANTONIO	0	0	0
675	198	SAN FRANCISCO	0	0	0
676	199	AGUASAY	0	0	0
677	200	CARIPITO	0	0	0
678	201	CARIPE	0	0	0
679	201	EL GUACHARO	0	0	0
680	201	LA GUANOTA	0	0	0
681	201	SABANA DE PIEDRA	0	0	0
682	201	SAN AGUSTIN	0	0	0
683	201	TERESEN	0	0	0
684	202	AREO	0	0	0
685	202	CAICARA	0	0	0
686	202	SAN FELIX	0	0	0
687	202	VIENTO FRESCO	0	0	0
688	203	EL TEJERO	0	0	0
689	203	PUNTA DE MATA	0	0	0
690	204	CHAGUARAMAS	0	0	0
691	204	LAS ALHUACAS	0	0	0
692	204	TABASCA	0	0	0
693	204	TEMBLADOR	0	0	0
694	205	ALTO DE LOS GODOS	0	0	0
695	205	BOQUERON	0	0	0
696	205	EL COROZO	0	0	0
697	205	EL FURRIAL	0	0	0
698	205	JUSEPIN	0	0	0
699	205	LA PICA	0	0	0
700	205	LAS COCUIZAS	0	0	0
701	205	SAN SIMON	0	0	0
702	205	SANTA CRUZ	0	0	0
703	205	SAN VICENTE	0	0	0
704	206	APARICIO	0	0	0
705	206	ARAGUA	0	0	0
706	206	CHAGUARAMAL	0	0	0
707	206	EL PINTO	0	0	0
708	206	GUANAGUANA	0	0	0
709	206	LA TOSCANA	0	0	0
710	206	TAGUAYA	0	0	0
711	207	CACHIPO	0	0	0
712	207	QUIRIQUIRE	0	0	0
713	208	SANTA BARBARA	0	0	0
714	209	BARRANCAS	0	0	0
715	209	LOS BARRANCOS DE FAJARDO	0	0	0
716	210	URACOA	0	0	0
717	211	CM.LA PLAZA DE PARAGUACHI	0	0	0
718	212	LA ASUNCION	0	0	0
719	213	SAN JUAN BAUTISTA	0	0	0
720	213	ZABALA	0	0	0
721	214	FRANCISCO FAJARDO	0	0	0
722	214	VALLE ESP SANTO	0	0	0
723	215	BOLIVAR	0	0	0
724	215	GUEVARA	0	0	0
725	215	MATASIETE	0	0	0
726	215	SANTA ANA	0	0	0
727	215	SUCRE	0	0	0
728	216	AGUIRRE	0	0	0
729	216	PAMPATAR	0	0	0
730	217	ADRIAN	0	0	0
731	217	JUAN GRIEGO	0	0	0
732	218	PORLAMAR	0	0	0
733	219	BOCA DEL RIO	0	0	0
734	219	SAN FRANCISCO	0	0	0
735	220	LOS BARALES	0	0	0
736	220	PUNTA DE PIEDRAS	0	0	0
737	221	SAN PEDRO DE COCHE	0	0	0
738	221	VICENTE FUENTES	0	0	0
739	222	AGUA BLANCA	0	0	0
740	223	ARAURE	0	0	0
741	223	RIO ACARIGUA	0	0	0
742	224	PIRITU	0	0	0
743	224	UVERAL	0	0	0
744	225	CORDOBA	0	0	0
745	225	GUANARE	0	0	0
746	225	SAN JOSE DE LA MONTAÃ‘A	0	0	0
747	225	SAN JUAN GUANAGUANARE	0	0	0
748	225	VIRGEN DE LA COROMOTO	0	0	0
749	226	DIVINA PASTORA	0	0	0
750	226	GUANARITO	0	0	0
751	226	TRINIDAD DE LA CAPILLA	0	0	0
752	227	CHABASQUEN	0	0	0
753	227	PEÃ‘A BLANCA	0	0	0
754	228	APARICION	0	0	0
755	228	LA ESTACION	0	0	0
756	228	OSPINO	0	0	0
757	229	ACARIGUA	0	0	0
758	229	PAYARA	0	0	0
759	229	PIMPINELA	0	0	0
760	229	RAMON PERAZA	0	0	0
761	230	CAÃ‘O DELGADITO	0	0	0
762	230	PAPELON	0	0	0
763	231	ANTOLIN TOVAR AQUINO	0	0	0
764	231	BOCONOITO	0	0	0
765	232	SAN RAFAEL DE ONOTO	0	0	0
766	232	SANTA FE	0	0	0
767	232	THERMO MORLES	0	0	0
768	233	EL PLAYON	0	0	0
769	233	FLORIDA	0	0	0
770	234	BISCUCUY	0	0	0
771	234	CONCEPCION	0	0	0
772	234	SAN JOSE DE SAGUAZ	0	0	0
773	234	SAN RAFAEL PALO ALZADO	0	0	0
774	234	UVENCIO A VELASQUEZ	0	0	0
775	234	VILLA ROSA	0	0	0
776	235	CANELONES	0	0	0
777	235	SAN ISIDRO LABRADOR	0	0	0
778	235	SANTA CRUZ	0	0	0
779	235	VILLA BRUZUAL	0	0	0
780	236	MARIÃ‘O	0	0	0
781	236	ROMULO GALLEGOS	0	0	0
782	237	SAN JOSE DE AREOCUAR	0	0	0
783	237	TAVERA ACOSTA	0	0	0
784	238	ANTONIO JOSE DE SUCRE	0	0	0
785	238	EL MORRO DE PTO SANTO	0	0	0
786	238	PUERTO SANTO	0	0	0
787	238	RIO CARIBE	0	0	0
788	238	SAN JUAN GALDONAS	0	0	0
789	239	EL PILAR	0	0	0
790	239	EL RINCON	0	0	0
791	239	GRAL FCO. A VASQUEZ	0	0	0
792	239	GUARAUNOS	0	0	0
793	239	TUNAPUICITO	0	0	0
794	239	UNION	0	0	0
795	240	BOLIVAR	0	0	0
796	240	MACARAPANA	0	0	0
797	240	SANTA CATALINA	0	0	0
798	240	SANTA ROSA	0	0	0
799	240	SANTA TERESA	0	0	0
800	241	MARIGUITAR	0	0	0
801	242	LIBERTAD	0	0	0
802	242	PAUJIL	0	0	0
803	242	YAGUARAPARO	0	0	0
804	243	ARAYA	0	0	0
805	243	CHACOPATA	0	0	0
806	243	MANICUARE	0	0	0
807	244	CAMPO ELIAS	0	0	0
808	244	TUNAPUY	0	0	0
809	245	CAMPO CLARO	0	0	0
810	245	IRAPA	0	0	0
811	245	MARABAL	0	0	0
812	245	SAN ANTONIO DE IRAPA	0	0	0
813	245	SORO	0	0	0
814	246	SAN ANT DEL GOLFO	0	0	0
815	247	ARENAS	0	0	0
816	247	ARICAGUA	0	0	0
817	247	COCOLLAR	0	0	0
818	247	CUMANACOA	0	0	0
819	247	SAN FERNANDO	0	0	0
820	247	SAN LORENZO	0	0	0
821	248	CARIACO	0	0	0
822	248	CATUARO	0	0	0
823	248	RENDON	0	0	0
824	248	SANTA CRUZ	0	0	0
825	248	SANTA MARIA	0	0	0
826	249	ALTAGRACIA	0	0	0
827	249	AYACUCHO	0	0	0
828	249	GRAN MARISCAL	0	0	0
829	249	RAUL LEONI	0	0	0
830	249	SAN JUAN	0	0	0
831	249	SANTA INES	0	0	0
832	249	VALENTIN VALIENTE	0	0	0
833	250	BIDEAU	0	0	0
834	250	CRISTOBAL COLON	0	0	0
835	250	GUIRIA	0	0	0
836	250	PUNTA DE PIEDRA	0	0	0
837	251	CORDERO	0	0	0
838	252	LAS MESAS	0	0	0
839	253	COLON	0	0	0
840	253	RIVAS BERTI	0	0	0
841	253	SAN PEDRO DEL RIO	0	0	0
842	254	ISAIAS MEDINA ANGARITA	0	0	0
843	254	JUAN VICENTE GOMEZ	0	0	0
844	254	PALOTAL	0	0	0
845	254	SANTA ANA DEL TACHIRA	0	0	0
846	255	AMENODORO RANGEL LAMU	0	0	0
847	255	LA FLORIDA	0	0	0
848	255	TARIBA	0	0	0
849	256	STA. ANA DEL TACHIRA	0	0	0
850	257	ALBERTO ADRIANI	0	0	0
851	257	CM.SAN RAFAEL DEL PINAL	0	0	0
852	257	SANTO DOMINGO	0	0	0
853	258	SAN JOSE DE BOLIVAR	0	0	0
854	259	BOCA DE GRITA	0	0	0
855	259	JOSE ANTONIO PAEZ	0	0	0
856	259	LA FRIA	0	0	0
857	260	PALMIRA	0	0	0
858	261	CAPACHO NUEVO	0	0	0
859	261	JUAN GERMAN ROSCIO	0	0	0
860	261	ROMAN CARDENAS	0	0	0
861	262	EMILIO C. GUERRERO	0	0	0
862	262	LA GRITA	0	0	0
863	262	MONS. MIGUEL A SALAS	0	0	0
864	263	EL COBRE	0	0	0
865	264	BRAMON	0	0	0
866	264	LA PETROLEA	0	0	0
867	264	QUINIMARI	0	0	0
868	264	RUBIO	0	0	0
869	265	CAPACHO VIEJO	0	0	0
870	265	CIPRIANO CASTRO	0	0	0
871	265	MANUEL FELIPE RUGELES	0	0	0
872	266	ABEJALES	0	0	0
873	266	DORADAS	0	0	0
874	266	EMETERIO OCHOA	0	0	0
875	266	SAN JOAQUIN DE NAVAY	0	0	0
876	267	CONSTITUCION	0	0	0
877	267	LOBATERA	0	0	0
878	268	MICHELENA	0	0	0
879	269	COLONCITO	0	0	0
880	269	LA PALMITA	0	0	0
881	270	NUEVA ARCADIA	0	0	0
882	270	UREÃ‘A	0	0	0
883	271	DELICIAS	0	0	0
884	272	BOCONO	0	0	0
885	272	HERNANDEZ	0	0	0
886	272	LA TENDIDA	0	0	0
887	273	DR. FCO. ROMERO LOBO	0	0	0
888	273	LA CONCORDIA	0	0	0
889	273	PEDRO MARIA MORANTES	0	0	0
890	273	SAN SEBASTIAN	0	0	0
891	273	SAN JUAN BAUTISTA	0	0	0
892	274	SEBORUCO	0	0	0
893	275	SAN SIMON	0	0	0
894	276	ELEAZAR LOPEZ CONTRERA	0	0	0
895	276	QUENIQUEA	0	0	0
896	276	SAN PABLO	0	0	0
897	277	SAN JOSECITO	0	0	0
898	278	CARDENAS	0	0	0
899	278	JUAN PABLO PEÃ‘ALOZA	0	0	0
900	278	POTOSI	0	0	0
901	278	PREGONERO	0	0	0
902	279	UMUQUENA	0	0	0
903	280	ARAGUANEY	0	0	0
904	280	EL JAGUITO	0	0	0
905	280	LA ESPERANZA	0	0	0
906	280	SANTA ISABEL	0	0	0
907	281	AYACUCHO	0	0	0
908	281	BOCONO	0	0	0
909	281	BURBUSAY	0	0	0
910	281	EL CARMEN	0	0	0
911	281	GENERAL RIVAS	0	0	0
912	281	GUARAMACAL	0	0	0
913	281	LA VEGA DE GUARAMACAL	0	0	0
914	281	MONSEÃ‘OR JAUREGUI	0	0	0
915	281	MOSQUEY	0	0	0
916	281	RAFAEL RANGEL	0	0	0
917	281	SAN JOSE	0	0	0
918	281	SAN MIGUEL	0	0	0
919	282	CHEREGUE	0	0	0
920	282	GRANADOS	0	0	0
921	282	SABANA GRANDE	0	0	0
922	283	ARNOLDO GABALDON	0	0	0
923	283	BOLIVIA	0	0	0
924	283	CARRILLO	0	0	0
925	283	CEGARRA	0	0	0
926	283	CHEJENDE	0	0	0
927	283	MANUEL SALVADOR ULLOA	0	0	0
928	283	SAN JOSE	0	0	0
929	284	CARACHE	0	0	0
930	284	CUICAS	0	0	0
931	284	LA CONCEPCION	0	0	0
932	284	PANAMERICANA	0	0	0
933	284	SANTA CRUZ	0	0	0
934	285	ESCUQUE	0	0	0
935	285	LA UNION	0	0	0
936	285	SABANA LIBRE	0	0	0
937	285	SANTA RITA	0	0	0
938	286	ANTONIO JOSE DE SUCRE	0	0	0
939	286	EL SOCORRO	0	0	0
940	286	LOS CAPRICHOS	0	0	0
941	287	ARNOLDO GABALDON	0	0	0
942	287	CAMPO ELIAS	0	0	0
943	288	EL PROGRESO	0	0	0
944	288	LA CEIBA	0	0	0
945	288	SANTA APOLONIA	0	0	0
946	288	TRES DE FEBRERO	0	0	0
947	289	AGUA CALIENTE	0	0	0
948	289	AGUA SANTA	0	0	0
949	289	EL CENIZO	0	0	0
950	289	EL DIVIDIVE	0	0	0
951	289	VALERITA	0	0	0
952	290	BUENA VISTA	0	0	0
953	290	MONTE CARMELO	0	0	0
954	290	STA MARIA DEL HORCON	0	0	0
955	291	EL BAÃ‘O	0	0	0
956	291	JALISCO	0	0	0
957	291	MOTATAN	0	0	0
958	292	FLOR DE PATRIA	0	0	0
959	292	LA PAZ	0	0	0
960	292	PAMPAN	0	0	0
961	292	SANTA ANA	0	0	0
962	293	LA CONCEPCION	0	0	0
963	293	PAMPANITO	0	0	0
964	293	PAMPANITO II	0	0	0
965	294	BETIJOQUE	0	0	0
966	294	EL CEDRO	0	0	0
967	294	JOSE G HERNANDEZ	0	0	0
968	294	LA PUEBLITA	0	0	0
969	295	ANTONIO N BRICEÃ‘O	0	0	0
970	295	CAMPO ALEGRE	0	0	0
971	295	CARVAJAL	0	0	0
972	295	JOSE LEONARDO SUAREZ	0	0	0
973	296	EL PARAISO	0	0	0
974	296	JUNIN	0	0	0
975	296	SABANA DE MENDOZA	0	0	0
976	296	VALMORE RODRIGUEZ	0	0	0
977	297	ANDRES LINARES	0	0	0
978	297	CHIQUINQUIRA	0	0	0
979	297	CRISTOBAL MENDOZA	0	0	0
980	297	CRUZ CARRILLO	0	0	0
981	297	MATRIZ	0	0	0
982	297	MONSEÃ‘OR CARRILLO	0	0	0
983	297	TRES ESQUINAS	0	0	0
984	298	CABIMBU	0	0	0
985	298	JAJO	0	0	0
986	298	LA MESA	0	0	0
987	298	LA QUEBRADA	0	0	0
988	298	SANTIAGO	0	0	0
989	298	TUÃ‘AME	0	0	0
990	299	JUAN IGNACIO MONTILLA	0	0	0
991	299	LA BEATRIZ	0	0	0
992	299	LA PUERTA	0	0	0
993	299	MENDOZA	0	0	0
994	299	MERCEDES DIAZ	0	0	0
995	299	SAN LUIS	0	0	0
996	300	SAN PABLO	0	0	0
997	301	AROA	0	0	0
998	302	CAMPO ELIAS	0	0	0
999	302	CHIVACOA	0	0	0
1000	303	COROTE	0	0	0
1001	304	INDEPENDENCIA	0	0	0
1002	305	SABANA DE PARRA	0	0	0
1003	306	BORAURE	0	0	0
1004	307	YUMARE	0	0	0
1005	308	NIRGUA	0	0	0
1006	308	SALOM	0	0	0
1007	308	TEMERLA	0	0	0
1008	309	SAN ANDRES	0	0	0
1009	309	YARITAGUA	0	0	0
1010	310	ALBARICO	0	0	0
1011	310	SAN FELIPE	0	0	0
1012	310	SAN JAVIER	0	0	0
1013	311	GUAMA	0	0	0
1014	312	URACHICHE	0	0	0
1015	313	EL GUAYABO	0	0	0
1016	313	FARRIAR	0	0	0
1017	314	VARGAS	0	0	0
1018	315	ISLA DE TOAS	0	0	0
1019	315	MONAGAS	0	0	0
1020	316	GENERAL URDANETA	0	0	0
1021	316	LIBERTADOR	0	0	0
1022	316	MANUEL GUANIPA MATOS	0	0	0
1023	316	MARCELINO BRICEÃ‘O	0	0	0
1024	316	PUEBLO NUEVO	0	0	0
1025	316	SAN TIMOTEO	0	0	0
1026	317	AMBROSIO	0	0	0
1027	317	ARISTIDES CALVANI	0	0	0
1028	317	CARMEN HERRERA	0	0	0
1029	317	GERMAN RIOS LINARES	0	0	0
1030	317	JORGE HERNANDEZ	0	0	0
1031	317	LA ROSA	0	0	0
1032	317	PUNTA GORDA	0	0	0
1033	317	ROMULO BETANCOURT	0	0	0
1034	317	SAN BENITO	0	0	0
1035	318	ENCONTRADOS	0	0	0
1036	318	UDON PEREZ	0	0	0
1037	319	MORALITO	0	0	0
1038	319	SAN CARLOS DEL ZULIA	0	0	0
1039	319	SANTA BARBARA	0	0	0
1040	319	SANTA CRUZ DEL ZULIA	0	0	0
1041	319	URRIBARRI	0	0	0
1042	320	CARLOS QUEVEDO	0	0	0
1043	320	FRANCISCO J PULGAR	0	0	0
1044	320	SIMON RODRIGUEZ	0	0	0
1045	321	JOSE RAMON YEPEZ	0	0	0
1046	321	LA CONCEPCION	0	0	0
1047	321	MARIANO PARRA LEON	0	0	0
1048	321	SAN JOSE	0	0	0
1049	322	BARI	0	0	0
1050	322	JESUS M SEMPRUN	0	0	0
1051	323	ANDRES BELLO (KM 48)	0	0	0
1052	323	CHIQUINQUIRA	0	0	0
1053	323	CONCEPCION	0	0	0
1054	323	EL CARMELO	0	0	0
1055	323	POTRERITOS	0	0	0
1056	324	ALONSO DE OJEDA	0	0	0
1057	324	CAMPO LARA	0	0	0
1058	324	ELEAZAR LOPEZ C	0	0	0
1059	324	LIBERTAD	0	0	0
1060	324	VENEZUELA	0	0	0
1061	325	BARTOLOME DE LAS CASAS	0	0	0
1062	325	LIBERTAD	0	0	0
1063	325	RIO NEGRO	0	0	0
1064	325	SAN JOSE DE PERIJA	0	0	0
1065	326	LA SIERRITA	0	0	0
1066	326	LAS PARCELAS	0	0	0
1083	327	LUIS HURTADO HIGUERA	0	0	0
1084	327	MANUEL DAGNINO	0	0	0
1085	327	OLEGARIO VILLALOBOS	0	0	0
1086	327	RAUL LEONI	0	0	0
1087	327	SAN ISIDRO	0	0	0
1088	327	SANTA LUCIA	0	0	0
1089	327	VENANCIO PULGAR	0	0	0
1090	328	ALTAGRACIA	0	0	0
1091	328	ANA MARIA CAMPOS	0	0	0
1093	328	SAN ANTONIO	0	0	0
1094	328	SAN JOSE	0	0	0
1095	329	ALTA GUAJIRA	0	0	0
1096	329	ELIAS SANCHEZ RUBIO	0	0	0
1097	329	GOAJIRA	0	0	0
1098	329	SINAMAICA	0	0	0
1099	330	DONALDO GARCIA	0	0	0
1100	330	EL ROSARIO	0	0	0
1101	330	SIXTO ZAMBRANO	0	0	0
1102	331	DOMITILA FLORES	0	0	0
1103	331	EL BAJO	0	0	0
1104	331	FRANCISCO OCHOA	0	0	0
1105	331	LOS CORTIJOS	0	0	0
1106	331	MARCIAL HERNANDEZ	0	0	0
1107	331	SAN FRANCISCO	0	0	0
1108	332	EL MENE	0	0	0
1109	332	JOSE CENOVIO URRIBARR	0	0	0
1110	332	PEDRO LUCAS URRIBARRI	0	0	0
1111	332	SANTA RITA	0	0	0
1112	333	MANUEL MANRIQUE	0	0	0
1113	333	RAFAEL MARIA BARALT	0	0	0
1114	333	RAFAEL URDANETA	0	0	0
1115	334	BOBURES	0	0	0
1116	334	EL BATEY	0	0	0
1117	334	GIBRALTAR	0	0	0
1118	334	HERAS	0	0	0
1119	334	M.ARTURO CELESTINO A	0	0	0
1120	334	ROMULO GALLEGOS	0	0	0
1121	335	LA VICTORIA	0	0	0
1122	335	RAFAEL URDANETA	0	0	0
1123	335	RAUL CUENCA	0	0	0
1124	11	VALLE DE GUANAPE	0	0	0
1125	11	SANTA BARBARA	0	0	0
1126	314	CARABALLEDA	0	0	0
1127	314	CARAYACA	0	0	0
1128	314	CARUAO	0	0	0
1129	314	CATIA LA MAR	0	0	0
1130	314	EL JUNKO	0	0	0
1131	314	LA GUAIRA	0	0	0
1132	314	MACUTO	0	0	0
1133	314	MAIQUETIA	0	0	0
1134	314	NAIGUATÃ	0	0	0
1135	314	RAUL LEONI	0	0	0
1136	314	CARLOS SOUBLETTE	0	0	0
\.


--
-- Data for Name: e_perfil_usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_perfil_usuario (id_perfil, descripcion_perfil, estatus) FROM stdin;
1	Administrador	1
2	Coordinador de Circuito	1
3	Analista de Proyectos	1
4	Productores	1
\.


--
-- Name: e_perfil_usuario_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_perfil_usuario_id_perfil_seq', 1, true);


--
-- Data for Name: e_tipo_organizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.e_tipo_organizacion (id_tipo_org, tipo_org, estatus) FROM stdin;
1	Consejo Comunal	1
2	Comuna	1
3	Movimiento	1
4	Gobierno Parroquial	1
5	Colectivo	1
6	Eje Comunal	1
\.


--
-- Name: e_tipo_organizacion_id_tipo_org_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.e_tipo_organizacion_id_tipo_org_seq', 1, false);


--
-- Data for Name: e_unidades_Tiempo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."e_unidades_Tiempo" ("idUnidadTiempo", "descUnidadTiempo", "estatusUnidadTiempo") FROM stdin;
1	Hora(s)	1
2	Dia(s)	1
3	Semana(s)	1
4	Mes(es)	1
5	AÃ±o(s)	1
\.


--
-- Name: e_unidades_Tiempo_idUnidadTiempo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."e_unidades_Tiempo_idUnidadTiempo_seq"', 5, true);


--
-- Name: geo_estado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.geo_estado_id_seq', 25, false);


--
-- Name: geo_municipio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.geo_municipio_id_seq', 336, false);


--
-- Name: geo_parroquia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.geo_parroquia_id_seq', 1136, false);


--
-- Data for Name: v_actividades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_actividades (id_actividad, id_proyecto, tarea, fecha_inicio, fecha_fin, id_usuario, fecha_registro, id_usuario_registra, id_estatus, estatus_tabla) FROM stdin;
\.


--
-- Name: v_actividades_id_actividad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_actividades_id_actividad_seq', 56, true);


--
-- Data for Name: v_financiamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_financiamiento (id_financiamiento, id_proyecto, obj_financiamiento, id_ente_financiamiento, id_estatus_financiamiento, monto, monto_aprobado, monto_transferido, monto_pendiente, anio_financiamiento, tipo_financiamiento, estatus_tabla_financiamiento) FROM stdin;
\.


--
-- Name: v_financiamiento_id_financiamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_financiamiento_id_financiamiento_seq', 301, true);


--
-- Data for Name: v_fotos_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_fotos_proyecto (id_registro, id_proyecto, nombre_archivo, descripcion_archivo, estatus_tabla) FROM stdin;
\.


--
-- Name: v_fotos_proyecto_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_fotos_proyecto_id_registro_seq', 209, true);


--
-- Data for Name: v_general; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_general (id_registro, id_proyecto, estado_actual, problema_actual, estrategia, porcentaje_avance, estatus_tabla) FROM stdin;
\.


--
-- Name: v_general_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_general_id_registro_seq', 16, true);


--
-- Data for Name: v_historico_ingreso_exitoso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_historico_ingreso_exitoso (id, usuario, direccion_ip, nombre_maquina, fecha, hora) FROM stdin;
885	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	172.16.22.21                                      	admin                                                                                                                                                                                                   	2018-08-22	13:48:24
886	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2018-08-31	13:15:23
887	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	proxy01.gmsaberytrabajo.int                       	admin                                                                                                                                                                                                   	2018-08-31	13:15:23
888	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	colorado.gmsaberytrabajo.int                      	admin                                                                                                                                                                                                   	2018-08-31	13:25:01
889	56                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	mochima.gmsaberytrabajo.int                       	jmonsalve                                                                                                                                                                                               	2018-08-31	13:44:23
890	56                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	proxy01.gmsaberytrabajo.int                       	jmonsalve                                                                                                                                                                                               	2018-08-31	15:44:57
891	56                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	dns.gmsaberytrabajo.int                           	jmonsalve                                                                                                                                                                                               	2018-08-31	16:49:47
892	56                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	dns.gmsaberytrabajo.int                           	jmonsalve                                                                                                                                                                                               	2018-09-03	10:30:27
893	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	proxy01.gmsaberytrabajo.int                       	admin                                                                                                                                                                                                   	2018-09-03	10:54:48
919	56                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	colorado.gmsaberytrabajo.int                      	jmonsalve                                                                                                                                                                                               	2018-09-04	13:43:07
920	56                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	colorado.gmsaberytrabajo.int                      	jmonsalve                                                                                                                                                                                               	2018-09-05	10:15:07
921	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	proxy01.gmsaberytrabajo.int                       	admin                                                                                                                                                                                                   	2018-09-05	13:34:22
922	56                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	colorado.gmsaberytrabajo.int                      	jmonsalve                                                                                                                                                                                               	2018-09-05	13:34:44
\.


--
-- Name: v_historico_ingreso_exitoso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_historico_ingreso_exitoso_id_seq', 922, true);


--
-- Data for Name: v_historico_ingreso_fallido; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_historico_ingreso_fallido (id, usuario, direccion_ip, nombre_maquina, fecha, hora) FROM stdin;
\.


--
-- Name: v_historico_ingreso_fallido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_historico_ingreso_fallido_id_seq', 289, true);


--
-- Data for Name: v_inversion_fragmentada; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_inversion_fragmentada (id_inversion_fragmentada, id_proyecto, infraestructura, maquinaria, insumos, fuerza_trabajo, servicios, inversion, estatus_tabla) FROM stdin;
128	128	2.900.000,00	3.000.000,00	10,00	45.566,66	12.300,00	5.957.876,66	1
129	129	5,00	10,00	15,00	20,00	25,00	75,00	1
161	161	426.098.899,63	268.730.616,04	128.531.271,57	0,00	0,00	823.360.787,24	1
162	162	426.098.899,63	821.962.818,58	128.531.271,57	0,00	0,00	1.376.592.989,78	1
163	163	426.098.899,63	821.962.818,58	128.531.271,57	1.000,00	10.000,00	1.376.603.989,78	1
164	164	426.098.899,63	821.962.818,58	128.531.271,57	10.000,00	10.000,00	1.376.612.989,78	1
165	165	5.000.000,00	5.000.000,00	5.000.000,00	0,00	0,00	15.000.000,00	1
\.


--
-- Name: v_inversion_fragmentada_id_inversion_fragmentada_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_inversion_fragmentada_id_inversion_fragmentada_seq', 165, true);


--
-- Data for Name: v_org_comunitarias_sociales_vinculadas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_org_comunitarias_sociales_vinculadas (id_registro, id_proyecto, id_tipo_org, id_org, estatus_tabla) FROM stdin;
610	128	1	186	1
611	129	1	186	1
643	161	1	2	1
644	162	1	3	1
645	163	1	4	1
646	164	1	5	1
647	165	1	6	1
\.


--
-- Name: v_org_comunitarias_sociales_vinculadas_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_org_comunitarias_sociales_vinculadas_id_registro_seq', 647, true);


--
-- Name: v_organizacion_id_org_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_organizacion_id_org_seq', 1, false);


--
-- Data for Name: v_produccion_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_produccion_proyecto (id_produccion_proyecto, id_proyecto, estatus_produccion, fecha_produccion, prod_principal, meta_produccion, beneficiarios, estatus_tabla_produccion) FROM stdin;
128	128	Si	2018-08-29	pan campesino	456000	932	1
129	129	Si	2018-09-03	PAN CANILLA	1200/2018	932	1
161	161	No	2018-09-03	Pan canilla	3000	2184	1
162	162	Si	2018-09-04	PAN CANILLA	1000	1800	1
163	163	No	2018-09-05	PAN CANILLA	1000	1376	1
164	164	Si	2018-09-05	PAN CANILLA	1000	1087	1
\.


--
-- Name: v_produccion_proyecto_id_produccion_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_produccion_proyecto_id_produccion_proyecto_seq', 164, true);


--
-- Data for Name: v_productor_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_productor_proyecto (id_productor, id_proyecto, nomb_apel_productor, sexo_productor, tlf_productor, email_productor, estatus_productor) FROM stdin;
\.


--
-- Name: v_productor_proyecto_id_productor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_productor_proyecto_id_productor_seq', 1, false);


--
-- Data for Name: v_productores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_productores (id_registro, id_proyecto, num_pro_directos, num_prod_femeninos, num_prod_masculinos, num_prod_indirectos, estatus_tabla) FROM stdin;
128	128	12	8	4	1	1
129	129	12	8	4	5	1
161	161	12	10	2	10	1
162	162	12	6	6	10	1
163	163	8	6	2	10	1
164	164	12	8	4	10	1
165	165	15	8	7	10	1
\.


--
-- Name: v_productores_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_productores_id_registro_seq', 165, true);


--
-- Data for Name: v_productores_nuevo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_productores_nuevo (id_productor, cedula, nombre_apellido, telefono_1, telefono_2, correo_electronico, status_productor, serial_carnet, codigo_carnet, direccion, fecha_registro, id_usuario_registro, id_proyecto) FROM stdin;
\.


--
-- Name: v_productores_nuevo_id_productor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_productores_nuevo_id_productor_seq', 46, true);


--
-- Data for Name: v_productos_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_productos_proyecto (id_producto_proyecto, id_produccion_proyecto, id_proyecto, capacidad_instalada, cantidad, tiempo_produccion, precio_venta, terreno_producto, infra_producto, estatus_tabla_producto) FROM stdin;
\.


--
-- Name: v_productos_proyecto_id_producto_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_productos_proyecto_id_producto_proyecto_seq', 1, false);


--
-- Data for Name: v_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_proyecto (id_proyecto, nombre_proyecto, descripcion_proyecto, comite_eco_comunal, id_fig_juridica, figura_jur_reg, fecha_registro_proyecto, area_construccion, area_terreno, unidades_produccion, tiempo_instalacion, elaboracion, titularidad, proceso_formativo, balance_politico, estatus_tabla_proyecto, id_usuario_registra, requerimiento, posee) FROM stdin;
128	Ocho Estrella De Omar Torrijos	Panadería Clap Comunal	Si	1	si	2018-08-31	60	60	500	4 meses	Proyecto Formulado	Posee	Concluido	psuv	1	56	amasadora, bandejas	* LAMINADORA:\t\r\n2 hornos, 1 formadora, 2 cuchillos, 2 espátulas, 72 bandejas, 1 cortadora, 2 pinza, 1 mesa de acero inoxidable
129	Ocho Estrellas De Omar Torrijos	PANADERÍA CLAP COMUNAL	No	1	si	2018-09-03	50	75	1	5 DÌAS	Proyecto Formulado	Posee	Por Iniciar	EN FORMACIÒN	1	56	MUEBLES  PARA EXHIBICIÓN  DE PAN  \r\nMUEBLE DE DESPACHO DE MADERA\r\nSILLAS PARA ÁREA DE DESPACHO \r\nCESTAS PARA EXHIBICIÓN DE PAN \r\n	AMASADORA A ESPIRAL \r\nFORMADORA DE PAN EN BARRAS\r\nPICADORA DE PEDESTAL   \r\nHORNO ESTÁNDAR A GAS \r\nCARROS PORTÁTIL CON BANDEJAS\r\nMESA DE ACERO INOXIDABLE\r\n
161	Panaderia Escuela Bienestar Socialita 	Fabricación de Pan	Si	1	si	2018-09-05	105	115	150	2 meses	Proyecto Formulado	Posee	Iniciado	Combatir la guerra econónimica	1	56	MUEBLES  PARA EXHIBICIÓN  DE PAN  \r\nMUEBLE DE DESPACHO DE MADERA\r\nSILLAS PARA ÁREA DE DESPACHO \r\nCESTAS PARA EXHIBICIÓN DE PAN \r\n	AMASADORA A ESPIRAL \r\nFORMADORA DE PAN EN BARRAS\r\nPICADORA DE PEDESTAL   \r\nHORNO ESTÁNDAR A GAS \r\nCARROS PORTÁTIL CON BANDEJAS\r\nMESA DE ACERO INOXIDABLE\r\n
162	  Epsdc "la Grande"	URB. SABANA GRANDE CALLE EL COLEGIO URB. OPPE 69 \r\n	Si	1	si	2018-09-05	59	69	900	3 MESES	Proyecto Formulado	Posee	Iniciado	PROYECTO PARA COMBATIR LA GUERRA ECONOMICA	1	56	SEÑALÉTICAS\r\nLÁMPARAS DE EMERGENCIA\r\nEXTINTORES DE CO2 EN POLVO \r\n	MUEBLES  PARA EXHIBICIÓN  DE PAN  \r\nMUEBLE DE DESPACHO DE MADERA\r\nSILLAS PARA ÁREA DE DESPACHO \r\nCESTAS PARA EXHIBICIÓN DE PAN \r\n
163	Epsdc "salvador Ayende"	PANADERIA	Si	1	si	2018-09-05	80	90	900	4 MESES	Proyecto Formulado	Posee	Iniciado	PROYECTO PARA COMBATIR LA GUERRA ECONOMICA	1	56	CHEMISSE O FRANELA BLANCA CON LOGOS\r\nGORROS BLANCOS DE PANADERO CON LOGO\r\nDELANTALES DE PANADERO\r\nGUANTES PARA HORNO\r\n	AMASADORA A ESPIRAL \r\nFORMADORA DE PAN EN BARRAS\r\nPICADORA DE PEDESTAL   \r\nHORNO ESTÁNDAR A GAS \r\nCARROS PORTÁTIL CON BANDEJAS\r\nMESA DE ACERO INOXIDABLE\r\n
164	Epsdc "la Fortaleza De San Agustin"	PANADERIA	Si	1	si	2018-09-05	95	105	900	5 M3SES	Proyecto Formulado	Posee	Iniciado	PROYECTO PARA COMBATIR LA GUERRA ECONOMICA	1	56	AMASADORA A ESPIRAL \r\nFORMADORA DE PAN EN BARRAS\r\nPICADORA DE PEDESTAL   \r\nHORNO ESTÁNDAR A GAS \r\nCARROS PORTÁTIL CON BANDEJAS\r\nMESA DE ACERO INOXIDABLE\r\n	CHEMISSE O FRANELA BLANCA CON LOGOS\r\nGORROS BLANCOS DE PANADERO CON LOGO\r\nDELANTALES DE PANADERO\r\nGUANTES PARA HORNO\r\n
165	Empresa De Propiedad Social Indirecta Comunal Mama Rosa	EMPRESA TEXTIL	Si	5	si	2018-09-05	80	90	600	4 MESES	Proyecto NO Formulado	Posee	Iniciado	PROYECTO PARA COMBATIR LA GUERRA ECONOMICA 	1	56		
\.


--
-- Name: v_proyecto_id_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_proyecto_id_proyecto_seq', 165, true);


--
-- Data for Name: v_responsables_proyectos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_responsables_proyectos ("idRespproyecto", "idProyecto", "fechaAsignacion", "usuarioAsigna", "idUsuario", "estausResp") FROM stdin;
\.


--
-- Name: v_responsables_proyectos_idRespproyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."v_responsables_proyectos_idRespproyecto_seq"', 64, true);


--
-- Data for Name: v_seguimiento_actividades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_seguimiento_actividades (id_seguimiento, id_actividad, avance_actividad, dificultad_actividad, fecha_avance, porcentaje_avance_actividad, id_usuario_registra, id_estatus, estatus_tabla) FROM stdin;
\.


--
-- Name: v_seguimiento_actividades_id_seguimiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_seguimiento_actividades_id_seguimiento_seq', 87, true);


--
-- Data for Name: v_tipo_actividad_economica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_tipo_actividad_economica (id_registro, id_proyecto, id_cadena, id_area_cadena, estatus_tabla) FROM stdin;
271	128	1	28	1
272	129	1	28	1
304	161	1	28	1
305	162	1	28	1
306	163	1	28	1
307	164	1	28	1
308	165	10	23	1
\.


--
-- Name: v_tipo_actividad_economica_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_tipo_actividad_economica_id_registro_seq', 308, true);


--
-- Data for Name: v_ubicacion_proyecto_georeferencial; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_ubicacion_proyecto_georeferencial (id_registro, id_proyecto, estado, municipio, parroquia, id_circuito, id_eje_parroquial, latitud, longitud, direccion, estatus_tabla) FROM stdin;
128	128	6	104	333	2	30	10.501104087942334	 -66.90669536590576	Avenida Este 6, Caracas 1011, Distrito Capital, Venezuela	1
129	129	6	104	346	3	30			AV. BOLIVAR ESQ. ÑO PASTOR 	1
161	161	6	104	340	5	30	10.492516966273447	 -66.94642424583435	Casona Antonio Guzman Blanco, Calle La Quebradita, Caracas 1020, Distrito Capital, Venezuela	1
162	162	6	104	341	3	30	10.491409273513499	 -66.87446057796478	Av 2, Caracas 1050, Distrito Capital, Venezuela	1
163	163	6	104	353	1	30	10.513868287354613	 -66.93894624710083	Caminería, Caracas 1030, Distrito Capital, Venezuela	1
164	164	6	104	346	3	30	10.496314739909243	 -66.90571904182434	Residencias La Yerbera, Caracas 1014, Distrito Capital, Venezuela	1
\.


--
-- Name: v_ubicacion_proyecto_georeferencial_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_ubicacion_proyecto_georeferencial_id_registro_seq', 164, true);


--
-- Data for Name: v_usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.v_usuarios (id_usuario, cedula, nombre_usuario, telefono_1, telefono_2, correo_electronico, login, password, fecha_registro, id_usuario_registra, ip_maquina_registra, status_usuario, status_clave, id_perfil, id_parroquia, posee, requiere, tipo, terreno, tipo_proyecto) FROM stdin;
1	123456789	Super Usuario	02121234567	04121234567	root@root.com	admin	7a86283503d4731822d5a96800fe0bd6	2012-03-21 00:00:00	1	172.16.0.183	1	1	1	\N	\N	\N	\N	\N	\N
56	5534472	JULIO MONSALVE	04166241209		juliomonsalvep@gmail.com	jmonsalve	e10adc3949ba59abbe56e057f20f883e	2018-08-31 13:44:10	1	172.16.22.79	1	0	4	\N	\N	\N	\N	\N	\N
\.


--
-- Name: v_usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.v_usuarios_id_usuario_seq', 88, true);


--
-- Name: e_area_cadena e_area_cadena_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_area_cadena
    ADD CONSTRAINT e_area_cadena_pkey PRIMARY KEY (id_area);


--
-- Name: e_cadena e_cadena_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_cadena
    ADD CONSTRAINT e_cadena_pkey PRIMARY KEY (id_cadena);


--
-- Name: e_circuito e_circuito_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_circuito
    ADD CONSTRAINT e_circuito_pkey PRIMARY KEY (id_circuito);


--
-- Name: e_eje_parroquial e_eje_parroquial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_eje_parroquial
    ADD CONSTRAINT e_eje_parroquial_pkey PRIMARY KEY (id_eje);


--
-- Name: e_ente_financiamiento e_ente_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_ente_financiamiento
    ADD CONSTRAINT e_ente_financiamiento_pkey PRIMARY KEY (id_ente);


--
-- Name: e_estatus_actividades e_estatus_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_estatus_actividades
    ADD CONSTRAINT e_estatus_actividades_pkey PRIMARY KEY (id_estatus);


--
-- Name: e_estatus_financiamiento e_estatus_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_estatus_financiamiento
    ADD CONSTRAINT e_estatus_financiamiento_pkey PRIMARY KEY (id_estatus_financiamiento);


--
-- Name: e_figura_juridica e_figura_juridica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_figura_juridica
    ADD CONSTRAINT e_figura_juridica_pkey PRIMARY KEY (id_figura);


--
-- Name: e_organizacion e_organizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_organizacion
    ADD CONSTRAINT e_organizacion_pkey PRIMARY KEY (id_org);


--
-- Name: e_parroquia e_parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_parroquia
    ADD CONSTRAINT e_parroquia_pkey PRIMARY KEY (id);


--
-- Name: e_perfil_usuario e_perfil_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_perfil_usuario
    ADD CONSTRAINT e_perfil_usuario_pkey PRIMARY KEY (id_perfil);


--
-- Name: e_tipo_organizacion e_tipo_organizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_tipo_organizacion
    ADD CONSTRAINT e_tipo_organizacion_pkey PRIMARY KEY (id_tipo_org);


--
-- Name: e_unidades_Tiempo e_unidades_Tiempo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."e_unidades_Tiempo"
    ADD CONSTRAINT "e_unidades_Tiempo_pkey" PRIMARY KEY ("idUnidadTiempo");


--
-- Name: e_estado pk_id_geo_estado; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_estado
    ADD CONSTRAINT pk_id_geo_estado PRIMARY KEY (id);


--
-- Name: e_municipio pk_id_geo_municipio; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_municipio
    ADD CONSTRAINT pk_id_geo_municipio PRIMARY KEY (id);


--
-- Name: v_actividades v_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_actividades
    ADD CONSTRAINT v_actividades_pkey PRIMARY KEY (id_actividad);


--
-- Name: v_financiamiento v_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_financiamiento
    ADD CONSTRAINT v_financiamiento_pkey PRIMARY KEY (id_financiamiento);


--
-- Name: v_fotos_proyecto v_fotos_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_fotos_proyecto
    ADD CONSTRAINT v_fotos_proyecto_pkey PRIMARY KEY (id_registro);


--
-- Name: v_general v_general_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_general
    ADD CONSTRAINT v_general_pkey PRIMARY KEY (id_registro);


--
-- Name: v_historico_ingreso_exitoso v_historico_ingreso_exitoso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_historico_ingreso_exitoso
    ADD CONSTRAINT v_historico_ingreso_exitoso_pkey PRIMARY KEY (id);


--
-- Name: v_historico_ingreso_fallido v_historico_ingreso_fallido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_historico_ingreso_fallido
    ADD CONSTRAINT v_historico_ingreso_fallido_pkey PRIMARY KEY (id);


--
-- Name: v_inversion_fragmentada v_inversion_fragmentada_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_inversion_fragmentada
    ADD CONSTRAINT v_inversion_fragmentada_pkey PRIMARY KEY (id_inversion_fragmentada);


--
-- Name: v_org_comunitarias_sociales_vinculadas v_org_comunitarias_sociales_vinculadas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_org_comunitarias_sociales_vinculadas
    ADD CONSTRAINT v_org_comunitarias_sociales_vinculadas_pkey PRIMARY KEY (id_registro);


--
-- Name: v_produccion_proyecto v_produccion_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_produccion_proyecto
    ADD CONSTRAINT v_produccion_proyecto_pkey PRIMARY KEY (id_produccion_proyecto);


--
-- Name: v_productor_proyecto v_productor_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productor_proyecto
    ADD CONSTRAINT v_productor_proyecto_pkey PRIMARY KEY (id_productor);


--
-- Name: v_productores_nuevo v_productores_nuevo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productores_nuevo
    ADD CONSTRAINT v_productores_nuevo_pkey PRIMARY KEY (id_productor);


--
-- Name: v_productores v_productores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productores
    ADD CONSTRAINT v_productores_pkey PRIMARY KEY (id_registro);


--
-- Name: v_productos_proyecto v_productos_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productos_proyecto
    ADD CONSTRAINT v_productos_proyecto_pkey PRIMARY KEY (id_producto_proyecto);


--
-- Name: v_proyecto v_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_proyecto
    ADD CONSTRAINT v_proyecto_pkey PRIMARY KEY (id_proyecto);


--
-- Name: v_responsables_proyectos v_responsables_proyectos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_responsables_proyectos
    ADD CONSTRAINT v_responsables_proyectos_pkey PRIMARY KEY ("idRespproyecto");


--
-- Name: v_seguimiento_actividades v_seguimiento_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_seguimiento_actividades
    ADD CONSTRAINT v_seguimiento_actividades_pkey PRIMARY KEY (id_seguimiento);


--
-- Name: v_tipo_actividad_economica v_tipo_actividad_economica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_tipo_actividad_economica
    ADD CONSTRAINT v_tipo_actividad_economica_pkey PRIMARY KEY (id_registro);


--
-- Name: v_ubicacion_proyecto_georeferencial v_ubicacion_proyecto_georeferencial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_ubicacion_proyecto_georeferencial
    ADD CONSTRAINT v_ubicacion_proyecto_georeferencial_pkey PRIMARY KEY (id_registro);


--
-- Name: v_usuarios v_usuarios_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_usuarios
    ADD CONSTRAINT v_usuarios_cedula_key UNIQUE (cedula, login);


--
-- Name: v_usuarios v_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_usuarios
    ADD CONSTRAINT v_usuarios_pkey PRIMARY KEY (id_usuario);


--
-- Name: dir_edo; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX dir_edo ON public.e_estado USING btree (texto);


--
-- Name: dir_mun; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX dir_mun ON public.e_municipio USING btree (texto);


--
-- Name: dir_par; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX dir_par ON public.e_parroquia USING btree (texto);


--
-- Name: fki_id_usuario_registra_id_usuario; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_id_usuario_registra_id_usuario ON public.v_proyecto USING btree (id_usuario_registra);


--
-- Name: v_usuarios c_id_perfil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_usuarios
    ADD CONSTRAINT c_id_perfil FOREIGN KEY (id_perfil) REFERENCES public.e_perfil_usuario(id_perfil);


--
-- Name: CONSTRAINT c_id_perfil ON v_usuarios; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON CONSTRAINT c_id_perfil ON public.v_usuarios IS 'relacion con la tabla e_perfil_usuario';


--
-- Name: e_area_cadena e_area_cadena_id_cadena_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_area_cadena
    ADD CONSTRAINT e_area_cadena_id_cadena_fkey FOREIGN KEY (id_cadena) REFERENCES public.e_cadena(id_cadena);


--
-- Name: e_parroquia e_parroquia_id_geo_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_parroquia
    ADD CONSTRAINT e_parroquia_id_geo_municipio_fkey FOREIGN KEY (id_geo_municipio) REFERENCES public.e_municipio(id);


--
-- Name: e_municipio fk_id_geo_estado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.e_municipio
    ADD CONSTRAINT fk_id_geo_estado FOREIGN KEY (id_geo_estado) REFERENCES public.e_estado(id);


--
-- Name: v_productores_nuevo fk_idproyecto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productores_nuevo
    ADD CONSTRAINT fk_idproyecto FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_proyecto id_usuario_registra_id_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_proyecto
    ADD CONSTRAINT id_usuario_registra_id_usuario FOREIGN KEY (id_usuario_registra) REFERENCES public.v_usuarios(id_usuario);


--
-- Name: v_actividades v_actividades_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_actividades
    ADD CONSTRAINT v_actividades_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_financiamiento v_financiamiento_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_financiamiento
    ADD CONSTRAINT v_financiamiento_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_fotos_proyecto v_fotos_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_fotos_proyecto
    ADD CONSTRAINT v_fotos_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_general v_general_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_general
    ADD CONSTRAINT v_general_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_inversion_fragmentada v_inversion_fragmentada_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_inversion_fragmentada
    ADD CONSTRAINT v_inversion_fragmentada_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_org_comunitarias_sociales_vinculadas v_org_comunitarias_sociales_vinculadas_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_org_comunitarias_sociales_vinculadas
    ADD CONSTRAINT v_org_comunitarias_sociales_vinculadas_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_produccion_proyecto v_produccion_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_produccion_proyecto
    ADD CONSTRAINT v_produccion_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_productor_proyecto v_productor_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productor_proyecto
    ADD CONSTRAINT v_productor_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_productores v_productores_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productores
    ADD CONSTRAINT v_productores_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_productos_proyecto v_productos_proyecto_id_produccion_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_productos_proyecto
    ADD CONSTRAINT v_productos_proyecto_id_produccion_proyecto_fkey FOREIGN KEY (id_produccion_proyecto) REFERENCES public.v_produccion_proyecto(id_produccion_proyecto);


--
-- Name: v_seguimiento_actividades v_seguimiento_actividades_id_actividad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_seguimiento_actividades
    ADD CONSTRAINT v_seguimiento_actividades_id_actividad_fkey FOREIGN KEY (id_actividad) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_tipo_actividad_economica v_tipo_actividad_economica_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_tipo_actividad_economica
    ADD CONSTRAINT v_tipo_actividad_economica_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- Name: v_ubicacion_proyecto_georeferencial v_ubicacion_proyecto_georeferencial_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.v_ubicacion_proyecto_georeferencial
    ADD CONSTRAINT v_ubicacion_proyecto_georeferencial_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.v_proyecto(id_proyecto);


--
-- PostgreSQL database dump complete
--


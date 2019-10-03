--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.7
-- Dumped by pg_dump version 9.1.7
-- Started on 2013-05-02 09:15:59 VET

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 217 (class 3079 OID 11644)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2195 (class 0 OID 0)
-- Dependencies: 217
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 161 (class 1259 OID 43862)
-- Dependencies: 6
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
-- TOC entry 162 (class 1259 OID 43865)
-- Dependencies: 161 6
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
-- TOC entry 2196 (class 0 OID 0)
-- Dependencies: 162
-- Name: e_area_cadena_id_area_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_area_cadena_id_area_seq OWNED BY e_area_cadena.id_area;


--
-- TOC entry 163 (class 1259 OID 43867)
-- Dependencies: 2023 6
-- Name: e_cadena; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_cadena (
    id_cadena integer NOT NULL,
    cadena character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_cadena OWNER TO postgres;

--
-- TOC entry 164 (class 1259 OID 43871)
-- Dependencies: 163 6
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
-- TOC entry 2197 (class 0 OID 0)
-- Dependencies: 164
-- Name: e_cadena_id_cadena_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_cadena_id_cadena_seq OWNED BY e_cadena.id_cadena;


--
-- TOC entry 165 (class 1259 OID 43873)
-- Dependencies: 2025 6
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
-- TOC entry 166 (class 1259 OID 43877)
-- Dependencies: 6 165
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
-- TOC entry 2198 (class 0 OID 0)
-- Dependencies: 166
-- Name: e_circuito_id_circuito_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_circuito_id_circuito_seq OWNED BY e_circuito.id_circuito;


--
-- TOC entry 167 (class 1259 OID 43879)
-- Dependencies: 2027 6
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
-- TOC entry 168 (class 1259 OID 43883)
-- Dependencies: 167 6
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
-- TOC entry 2199 (class 0 OID 0)
-- Dependencies: 168
-- Name: e_eje_parroquial_id_eje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_eje_parroquial_id_eje_seq OWNED BY e_eje_parroquial.id_eje;


--
-- TOC entry 169 (class 1259 OID 43885)
-- Dependencies: 6
-- Name: e_ente_financiamiento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_ente_financiamiento (
    id_ente integer NOT NULL,
    ente character varying(100),
    estatus_tabla integer
);


ALTER TABLE public.e_ente_financiamiento OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 43888)
-- Dependencies: 169 6
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
-- TOC entry 2200 (class 0 OID 0)
-- Dependencies: 170
-- Name: e_ente_financiamiento_id_ente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_ente_financiamiento_id_ente_seq OWNED BY e_ente_financiamiento.id_ente;


--
-- TOC entry 171 (class 1259 OID 43890)
-- Dependencies: 6
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
-- TOC entry 172 (class 1259 OID 43893)
-- Dependencies: 6
-- Name: e_estatus_financiamiento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_estatus_financiamiento (
    id_estatus_financiamiento integer NOT NULL,
    estatus_financiamiento character varying(50),
    estatus_tabla integer
);


ALTER TABLE public.e_estatus_financiamiento OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 43896)
-- Dependencies: 6 172
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
-- TOC entry 2201 (class 0 OID 0)
-- Dependencies: 173
-- Name: e_estatus_financiamiento_id_estatus_financiamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_estatus_financiamiento_id_estatus_financiamiento_seq OWNED BY e_estatus_financiamiento.id_estatus_financiamiento;


--
-- TOC entry 174 (class 1259 OID 43898)
-- Dependencies: 6
-- Name: e_figura_juridica; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_figura_juridica (
    id_figura integer NOT NULL,
    figura_juridica character varying(50),
    estatus_tabla integer
);


ALTER TABLE public.e_figura_juridica OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 43901)
-- Dependencies: 174 6
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
-- TOC entry 2202 (class 0 OID 0)
-- Dependencies: 175
-- Name: e_figura_juridica_id_figura_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_figura_juridica_id_figura_seq OWNED BY e_figura_juridica.id_figura;


--
-- TOC entry 176 (class 1259 OID 43903)
-- Dependencies: 6
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
-- TOC entry 177 (class 1259 OID 43906)
-- Dependencies: 2034 6
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
-- TOC entry 178 (class 1259 OID 43910)
-- Dependencies: 6
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
-- TOC entry 179 (class 1259 OID 43913)
-- Dependencies: 2036 6
-- Name: e_tipo_organizacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE e_tipo_organizacion (
    id_tipo_org integer NOT NULL,
    tipo_org character varying(100),
    estatus integer DEFAULT 1
);


ALTER TABLE public.e_tipo_organizacion OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 43917)
-- Dependencies: 179 6
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
-- TOC entry 2203 (class 0 OID 0)
-- Dependencies: 180
-- Name: e_tipo_organizacion_id_tipo_org_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE e_tipo_organizacion_id_tipo_org_seq OWNED BY e_tipo_organizacion.id_tipo_org;


--
-- TOC entry 181 (class 1259 OID 43919)
-- Dependencies: 2038 6
-- Name: e_unidades_Tiempo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "e_unidades_Tiempo" (
    "idUnidadTiempo" integer NOT NULL,
    "descUnidadTiempo" character varying(50) NOT NULL,
    "estatusUnidadTiempo" integer DEFAULT 1 NOT NULL
);


ALTER TABLE public."e_unidades_Tiempo" OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 43923)
-- Dependencies: 181 6
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
-- TOC entry 2204 (class 0 OID 0)
-- Dependencies: 182
-- Name: e_unidades_Tiempo_idUnidadTiempo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "e_unidades_Tiempo_idUnidadTiempo_seq" OWNED BY "e_unidades_Tiempo"."idUnidadTiempo";


--
-- TOC entry 183 (class 1259 OID 43925)
-- Dependencies: 171 6
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
-- TOC entry 2205 (class 0 OID 0)
-- Dependencies: 183
-- Name: geo_estado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE geo_estado_id_seq OWNED BY e_estado.id;


--
-- TOC entry 184 (class 1259 OID 43927)
-- Dependencies: 6 176
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
-- TOC entry 2206 (class 0 OID 0)
-- Dependencies: 184
-- Name: geo_municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE geo_municipio_id_seq OWNED BY e_municipio.id;


--
-- TOC entry 185 (class 1259 OID 43929)
-- Dependencies: 178 6
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
-- TOC entry 2207 (class 0 OID 0)
-- Dependencies: 185
-- Name: geo_parroquia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE geo_parroquia_id_seq OWNED BY e_parroquia.id;


--
-- TOC entry 186 (class 1259 OID 43931)
-- Dependencies: 6
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
-- TOC entry 187 (class 1259 OID 43934)
-- Dependencies: 6 186
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
-- TOC entry 2208 (class 0 OID 0)
-- Dependencies: 187
-- Name: v_financiamiento_id_financiamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_financiamiento_id_financiamiento_seq OWNED BY v_financiamiento.id_financiamiento;


--
-- TOC entry 188 (class 1259 OID 43936)
-- Dependencies: 2041 6
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
-- TOC entry 189 (class 1259 OID 43943)
-- Dependencies: 188 6
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
-- TOC entry 2209 (class 0 OID 0)
-- Dependencies: 189
-- Name: v_fotos_proyecto_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_fotos_proyecto_id_registro_seq OWNED BY v_fotos_proyecto.id_registro;


--
-- TOC entry 190 (class 1259 OID 43945)
-- Dependencies: 6
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
-- TOC entry 191 (class 1259 OID 43951)
-- Dependencies: 6 190
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
-- TOC entry 2210 (class 0 OID 0)
-- Dependencies: 191
-- Name: v_historico_ingreso_exitoso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_historico_ingreso_exitoso_id_seq OWNED BY v_historico_ingreso_exitoso.id;


--
-- TOC entry 192 (class 1259 OID 43953)
-- Dependencies: 6
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
-- TOC entry 193 (class 1259 OID 43956)
-- Dependencies: 6 192
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
-- TOC entry 2211 (class 0 OID 0)
-- Dependencies: 193
-- Name: v_historico_ingreso_fallido_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_historico_ingreso_fallido_id_seq OWNED BY v_historico_ingreso_fallido.id;


--
-- TOC entry 194 (class 1259 OID 43958)
-- Dependencies: 2045 6
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
-- TOC entry 195 (class 1259 OID 43962)
-- Dependencies: 6 194
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
-- TOC entry 2212 (class 0 OID 0)
-- Dependencies: 195
-- Name: v_org_comunitarias_sociales_vinculadas_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_org_comunitarias_sociales_vinculadas_id_registro_seq OWNED BY v_org_comunitarias_sociales_vinculadas.id_registro;


--
-- TOC entry 196 (class 1259 OID 43964)
-- Dependencies: 177 6
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
-- TOC entry 2213 (class 0 OID 0)
-- Dependencies: 196
-- Name: v_organizacion_id_org_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_organizacion_id_org_seq OWNED BY e_organizacion.id_org;


--
-- TOC entry 197 (class 1259 OID 43966)
-- Dependencies: 6
-- Name: v_produccion_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_produccion_proyecto (
    id_produccion_proyecto integer NOT NULL,
    id_proyecto integer,
    estatus_produccion character varying(2),
    fecha_produccion date,
    prod_principal character varying(50) NOT NULL,
    meta_produccion character varying(50) NOT NULL,
    estatus_tabla_produccion integer NOT NULL
);


ALTER TABLE public.v_produccion_proyecto OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 43969)
-- Dependencies: 197 6
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
-- TOC entry 2214 (class 0 OID 0)
-- Dependencies: 198
-- Name: v_produccion_proyecto_id_produccion_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_produccion_proyecto_id_produccion_proyecto_seq OWNED BY v_produccion_proyecto.id_produccion_proyecto;


--
-- TOC entry 199 (class 1259 OID 43971)
-- Dependencies: 6
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
-- TOC entry 200 (class 1259 OID 43974)
-- Dependencies: 6 199
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
-- TOC entry 2215 (class 0 OID 0)
-- Dependencies: 200
-- Name: v_productor_proyecto_id_productor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_productor_proyecto_id_productor_seq OWNED BY v_productor_proyecto.id_productor;


--
-- TOC entry 201 (class 1259 OID 43976)
-- Dependencies: 2049 6
-- Name: v_productores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_productores (
    id_registro integer NOT NULL,
    id_proyecto integer NOT NULL,
    num_pro_directos integer NOT NULL,
    num_prod_femeninos integer NOT NULL,
    num_prod_masculinos integer NOT NULL,
    estatus_tabla integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_productores OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 43980)
-- Dependencies: 201 6
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
-- TOC entry 2216 (class 0 OID 0)
-- Dependencies: 202
-- Name: v_productores_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_productores_id_registro_seq OWNED BY v_productores.id_registro;


--
-- TOC entry 203 (class 1259 OID 43982)
-- Dependencies: 6
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
-- TOC entry 204 (class 1259 OID 43988)
-- Dependencies: 203 6
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
-- TOC entry 2217 (class 0 OID 0)
-- Dependencies: 204
-- Name: v_productos_proyecto_id_producto_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_productos_proyecto_id_producto_proyecto_seq OWNED BY v_productos_proyecto.id_producto_proyecto;


--
-- TOC entry 205 (class 1259 OID 43990)
-- Dependencies: 6
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
    estatus_tabla_proyecto integer,
    id_usuario_registra integer
);


ALTER TABLE public.v_proyecto OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 43996)
-- Dependencies: 205 6
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
-- TOC entry 2218 (class 0 OID 0)
-- Dependencies: 206
-- Name: v_proyecto_id_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_proyecto_id_proyecto_seq OWNED BY v_proyecto.id_proyecto;


--
-- TOC entry 207 (class 1259 OID 43998)
-- Dependencies: 2053 6
-- Name: v_responsable_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE v_responsable_proyecto (
    id_resp_proyecto integer NOT NULL,
    id_proyecto integer NOT NULL,
    fecha_asignacion date NOT NULL,
    id_usuario integer NOT NULL,
    id_usuario_asigna integer NOT NULL,
    estatus_resp integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.v_responsable_proyecto OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 44002)
-- Dependencies: 207 6
-- Name: v_responsable_proyecto_id_resp_proyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE v_responsable_proyecto_id_resp_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.v_responsable_proyecto_id_resp_proyecto_seq OWNER TO postgres;

--
-- TOC entry 2219 (class 0 OID 0)
-- Dependencies: 208
-- Name: v_responsable_proyecto_id_resp_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_responsable_proyecto_id_resp_proyecto_seq OWNED BY v_responsable_proyecto.id_resp_proyecto;


--
-- TOC entry 209 (class 1259 OID 44004)
-- Dependencies: 2055 6
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
-- TOC entry 210 (class 1259 OID 44008)
-- Dependencies: 209 6
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
-- TOC entry 2220 (class 0 OID 0)
-- Dependencies: 210
-- Name: v_tipo_actividad_economica_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_tipo_actividad_economica_id_registro_seq OWNED BY v_tipo_actividad_economica.id_registro;


--
-- TOC entry 211 (class 1259 OID 44010)
-- Dependencies: 2057 6
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
    direccion character varying(200) NOT NULL,
    estatus_tabla integer DEFAULT 1
);


ALTER TABLE public.v_ubicacion_proyecto_georeferencial OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 44014)
-- Dependencies: 6 211
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
-- TOC entry 2221 (class 0 OID 0)
-- Dependencies: 212
-- Name: v_ubicacion_proyecto_georeferencial_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_ubicacion_proyecto_georeferencial_id_registro_seq OWNED BY v_ubicacion_proyecto_georeferencial.id_registro;


--
-- TOC entry 213 (class 1259 OID 44016)
-- Dependencies: 2059 2060 6
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
    status_clave smallint DEFAULT (0)::smallint NOT NULL
);


ALTER TABLE public.v_usuarios OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 44021)
-- Dependencies: 6 213
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
-- TOC entry 2222 (class 0 OID 0)
-- Dependencies: 214
-- Name: v_usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE v_usuarios_id_usuario_seq OWNED BY v_usuarios.id_usuario;


--
-- TOC entry 215 (class 1259 OID 44023)
-- Dependencies: 2020 6
-- Name: vista_e_organizacion; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW vista_e_organizacion AS
    SELECT DISTINCT ON (e_organizacion.organizacion) e_organizacion.id_org, e_organizacion.id_tipo_org, e_organizacion.organizacion, e_organizacion.estatus FROM e_organizacion ORDER BY e_organizacion.organizacion;


ALTER TABLE public.vista_e_organizacion OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 44027)
-- Dependencies: 2021 6
-- Name: vista_e_organizacion3; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW vista_e_organizacion3 AS
    SELECT DISTINCT vista_e_organizacion.id_org, vista_e_organizacion.id_tipo_org, vista_e_organizacion.organizacion, vista_e_organizacion.estatus FROM vista_e_organizacion ORDER BY vista_e_organizacion.id_org;


ALTER TABLE public.vista_e_organizacion3 OWNER TO postgres;

--
-- TOC entry 2022 (class 2604 OID 44031)
-- Dependencies: 162 161
-- Name: id_area; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_area_cadena ALTER COLUMN id_area SET DEFAULT nextval('e_area_cadena_id_area_seq'::regclass);


--
-- TOC entry 2024 (class 2604 OID 44032)
-- Dependencies: 164 163
-- Name: id_cadena; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_cadena ALTER COLUMN id_cadena SET DEFAULT nextval('e_cadena_id_cadena_seq'::regclass);


--
-- TOC entry 2026 (class 2604 OID 44033)
-- Dependencies: 166 165
-- Name: id_circuito; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_circuito ALTER COLUMN id_circuito SET DEFAULT nextval('e_circuito_id_circuito_seq'::regclass);


--
-- TOC entry 2028 (class 2604 OID 44034)
-- Dependencies: 168 167
-- Name: id_eje; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_eje_parroquial ALTER COLUMN id_eje SET DEFAULT nextval('e_eje_parroquial_id_eje_seq'::regclass);


--
-- TOC entry 2029 (class 2604 OID 44035)
-- Dependencies: 170 169
-- Name: id_ente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_ente_financiamiento ALTER COLUMN id_ente SET DEFAULT nextval('e_ente_financiamiento_id_ente_seq'::regclass);


--
-- TOC entry 2030 (class 2604 OID 44036)
-- Dependencies: 183 171
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_estado ALTER COLUMN id SET DEFAULT nextval('geo_estado_id_seq'::regclass);


--
-- TOC entry 2031 (class 2604 OID 44037)
-- Dependencies: 173 172
-- Name: id_estatus_financiamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_estatus_financiamiento ALTER COLUMN id_estatus_financiamiento SET DEFAULT nextval('e_estatus_financiamiento_id_estatus_financiamiento_seq'::regclass);


--
-- TOC entry 2032 (class 2604 OID 44038)
-- Dependencies: 175 174
-- Name: id_figura; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_figura_juridica ALTER COLUMN id_figura SET DEFAULT nextval('e_figura_juridica_id_figura_seq'::regclass);


--
-- TOC entry 2033 (class 2604 OID 44039)
-- Dependencies: 184 176
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_municipio ALTER COLUMN id SET DEFAULT nextval('geo_municipio_id_seq'::regclass);


--
-- TOC entry 2035 (class 2604 OID 44040)
-- Dependencies: 185 178
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_parroquia ALTER COLUMN id SET DEFAULT nextval('geo_parroquia_id_seq'::regclass);


--
-- TOC entry 2037 (class 2604 OID 44041)
-- Dependencies: 180 179
-- Name: id_tipo_org; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_tipo_organizacion ALTER COLUMN id_tipo_org SET DEFAULT nextval('e_tipo_organizacion_id_tipo_org_seq'::regclass);


--
-- TOC entry 2039 (class 2604 OID 44042)
-- Dependencies: 182 181
-- Name: idUnidadTiempo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "e_unidades_Tiempo" ALTER COLUMN "idUnidadTiempo" SET DEFAULT nextval('"e_unidades_Tiempo_idUnidadTiempo_seq"'::regclass);


--
-- TOC entry 2040 (class 2604 OID 44043)
-- Dependencies: 187 186
-- Name: id_financiamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_financiamiento ALTER COLUMN id_financiamiento SET DEFAULT nextval('v_financiamiento_id_financiamiento_seq'::regclass);


--
-- TOC entry 2042 (class 2604 OID 44044)
-- Dependencies: 189 188
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_fotos_proyecto ALTER COLUMN id_registro SET DEFAULT nextval('v_fotos_proyecto_id_registro_seq'::regclass);


--
-- TOC entry 2043 (class 2604 OID 44045)
-- Dependencies: 191 190
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_historico_ingreso_exitoso ALTER COLUMN id SET DEFAULT nextval('v_historico_ingreso_exitoso_id_seq'::regclass);


--
-- TOC entry 2044 (class 2604 OID 44046)
-- Dependencies: 193 192
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_historico_ingreso_fallido ALTER COLUMN id SET DEFAULT nextval('v_historico_ingreso_fallido_id_seq'::regclass);


--
-- TOC entry 2046 (class 2604 OID 44047)
-- Dependencies: 195 194
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_org_comunitarias_sociales_vinculadas ALTER COLUMN id_registro SET DEFAULT nextval('v_org_comunitarias_sociales_vinculadas_id_registro_seq'::regclass);


--
-- TOC entry 2047 (class 2604 OID 44048)
-- Dependencies: 198 197
-- Name: id_produccion_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_produccion_proyecto ALTER COLUMN id_produccion_proyecto SET DEFAULT nextval('v_produccion_proyecto_id_produccion_proyecto_seq'::regclass);


--
-- TOC entry 2048 (class 2604 OID 44049)
-- Dependencies: 200 199
-- Name: id_productor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productor_proyecto ALTER COLUMN id_productor SET DEFAULT nextval('v_productor_proyecto_id_productor_seq'::regclass);


--
-- TOC entry 2050 (class 2604 OID 44050)
-- Dependencies: 202 201
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productores ALTER COLUMN id_registro SET DEFAULT nextval('v_productores_id_registro_seq'::regclass);


--
-- TOC entry 2051 (class 2604 OID 44051)
-- Dependencies: 204 203
-- Name: id_producto_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productos_proyecto ALTER COLUMN id_producto_proyecto SET DEFAULT nextval('v_productos_proyecto_id_producto_proyecto_seq'::regclass);


--
-- TOC entry 2052 (class 2604 OID 44052)
-- Dependencies: 206 205
-- Name: id_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_proyecto ALTER COLUMN id_proyecto SET DEFAULT nextval('v_proyecto_id_proyecto_seq'::regclass);


--
-- TOC entry 2054 (class 2604 OID 44053)
-- Dependencies: 208 207
-- Name: id_resp_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_responsable_proyecto ALTER COLUMN id_resp_proyecto SET DEFAULT nextval('v_responsable_proyecto_id_resp_proyecto_seq'::regclass);


--
-- TOC entry 2056 (class 2604 OID 44054)
-- Dependencies: 210 209
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_tipo_actividad_economica ALTER COLUMN id_registro SET DEFAULT nextval('v_tipo_actividad_economica_id_registro_seq'::regclass);


--
-- TOC entry 2058 (class 2604 OID 44055)
-- Dependencies: 212 211
-- Name: id_registro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_ubicacion_proyecto_georeferencial ALTER COLUMN id_registro SET DEFAULT nextval('v_ubicacion_proyecto_georeferencial_id_registro_seq'::regclass);


--
-- TOC entry 2061 (class 2604 OID 44056)
-- Dependencies: 214 213
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('v_usuarios_id_usuario_seq'::regclass);


--
-- TOC entry 2134 (class 0 OID 43862)
-- Dependencies: 161 2188
-- Data for Name: e_area_cadena; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_area_cadena (id_area, id_cadena, area, estatus_area) FROM stdin;
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
14	7	Mecánica	1
25	2	Distribuci&oacute;n	1
26	2	Servicios de la construcci&oacute;n	1
5	2	Producci&oacute;n	1
\.


--
-- TOC entry 2223 (class 0 OID 0)
-- Dependencies: 162
-- Name: e_area_cadena_id_area_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_area_cadena_id_area_seq', 1, false);


--
-- TOC entry 2136 (class 0 OID 43867)
-- Dependencies: 163 2188
-- Data for Name: e_cadena; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_cadena (id_cadena, cadena, estatus) FROM stdin;
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
-- TOC entry 2224 (class 0 OID 0)
-- Dependencies: 164
-- Name: e_cadena_id_cadena_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_cadena_id_cadena_seq', 1, false);


--
-- TOC entry 2138 (class 0 OID 43873)
-- Dependencies: 165 2188
-- Data for Name: e_circuito; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_circuito (id_circuito, id_municipio, circuito, estatus) FROM stdin;
1	104	Circuito 1	1
2	104	Circuito 2	1
3	104	Circuito 3	1
4	104	Circuito 4	1
5	104	Circuito 5	1
\.


--
-- TOC entry 2225 (class 0 OID 0)
-- Dependencies: 166
-- Name: e_circuito_id_circuito_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_circuito_id_circuito_seq', 5, true);


--
-- TOC entry 2140 (class 0 OID 43879)
-- Dependencies: 167 2188
-- Data for Name: e_eje_parroquial; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_eje_parroquial (id_eje, id_parroquia, eje, estatus) FROM stdin;
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
18	338	Eje panamericano	1
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
\.


--
-- TOC entry 2226 (class 0 OID 0)
-- Dependencies: 168
-- Name: e_eje_parroquial_id_eje_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_eje_parroquial_id_eje_seq', 1, false);


--
-- TOC entry 2142 (class 0 OID 43885)
-- Dependencies: 169 2188
-- Data for Name: e_ente_financiamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_ente_financiamiento (id_ente, ente, estatus_tabla) FROM stdin;
3	Gobierno del Distrito Capital	1
2	Consejo Federal de Gobierno	1
1	Alcaldía de Caracas	1
5	Ministerio del Poder Popular para las Comunas y Protección Social	1
4	Fondo de Compensación Interterritorial	0
6	Inapymi	1
7	Safonacc	0
8	Fondas	1
\.


--
-- TOC entry 2227 (class 0 OID 0)
-- Dependencies: 170
-- Name: e_ente_financiamiento_id_ente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_ente_financiamiento_id_ente_seq', 1, false);


--
-- TOC entry 2144 (class 0 OID 43890)
-- Dependencies: 171 2188
-- Data for Name: e_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_estado (id, texto, latitud, longitud) FROM stdin;
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
-- TOC entry 2145 (class 0 OID 43893)
-- Dependencies: 172 2188
-- Data for Name: e_estatus_financiamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_estatus_financiamiento (id_estatus_financiamiento, estatus_financiamiento, estatus_tabla) FROM stdin;
1	Aprobado en espera de recursos	0
5	NO Financiado	1
3	IDEA Financiada	0
4	IDEA NO Financiada	0
2	Financiado	1
\.


--
-- TOC entry 2228 (class 0 OID 0)
-- Dependencies: 173
-- Name: e_estatus_financiamiento_id_estatus_financiamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_estatus_financiamiento_id_estatus_financiamiento_seq', 1, true);


--
-- TOC entry 2147 (class 0 OID 43898)
-- Dependencies: 174 2188
-- Data for Name: e_figura_juridica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_figura_juridica (id_figura, figura_juridica, estatus_tabla) FROM stdin;
2	Grupo de Intercambio Solidario y Trueque	1
3	Unidad Productiva Familiar	1
4	Cooperativas	1
5	Empresa de propiedad Social Indirecta	1
1	Empresa de Propiedad Social Directa	1
\.


--
-- TOC entry 2229 (class 0 OID 0)
-- Dependencies: 175
-- Name: e_figura_juridica_id_figura_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_figura_juridica_id_figura_seq', 1, false);


--
-- TOC entry 2149 (class 0 OID 43903)
-- Dependencies: 176 2188
-- Data for Name: e_municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_municipio (id, id_geo_estado, texto, longitud, latitud) FROM stdin;
1	2	ALTO ORINOCO	-64.92	3,2
2	2	ATABAPO	-66.66	3,95
3	2	ATURES	-67.59	5,65
4	2	AUTANA	-66.97	4,8
5	2	MAROA	-67.28	2,87
6	2	MANAPIARE	-65.36	5,33
7	2	RÍO NEGRO	-65.65	1,64
8	1	ANACO	-64.46	9,43
9	1	ARAGUA	-64.83	9,46
10	1	FERNANDO DE PEÑALVER	-64.87	10,06
11	1	FRANCISCO DEL CARMEN CARVAJAL	-64.72	10,13
12	1	FRANCISCO DE MIRANDA	-64.31	8,79
13	1	GUANTA	-64.36	10,27
14	1	INDEPENDENCIA	-63.17	8,58
15	1	JUAN ANTONIO SOTILLO	-64.38	10,22
16	1	JUAN MANUEL CAJIGAL	-65.04	9,88
17	1	JOSÉ GREGORIO MONAGAS	-65.22	8,44
18	1	LIBERTAD	-64.72	10,13
19	1	MANUEL EZEQUIEL BRUZUAL	-64.89	9,96
20	1	PEDRO MARÍA FREITES	-64.36	9,29
21	1	PÍRITU	-64.79	9,98
22	1	SAN JOSÉ DE GUANIPA	-64.1	8,88
23	1	SAN JUAN DE CAPISTRANO	-65	10,04
24	1	SANTA ANA	-64.35	9,82
25	1	SIMÓN BOLÍVAR	-64.72	10,13
26	1	SIMÓN RODRÍGUEZ	-64.26	8,88
27	1	SIR ARTHUR MC GREGOR	-64.72	-64,72
28	1	DIEGO BAUTISTA URBANEJA	-64.59	10,17
29	3	ACHAGUAS	-68.31	7,6
30	3	BIRUACA	-67.3	7,75
31	3	MUÑOZ	-68.93	7,37
32	3	PÁEZ	-70.71	7,19
33	3	PEDRO CAMEJO	-67.66	6,97
34	3	RÓMULO GALLEGOS	-69.32	6,71
35	3	SAN FERNANDO	-66.91	7,52
36	4	BOLÍVAR	-67.28	10,33
37	4	CAMATAGUA	-66.87	9,9
38	4	GIRARDOT	-67.58	10,46
39	4	JOSÉ ANGEL LAMAS	-67.64	10,23
40	4	JOSÉ FÉLIX RIBAS	-67.58	10,18
41	4	JOSÉ RAFAEL REVENGA	-67.56	10,23
42	4	LIBERTADOR	-67.61	10,2
43	4	MARIO BRICEÑO IRAGORRY	-67.77	10,44
44	4	SAN CASIMIRO	-66.95	9,96
45	4	SAN SEBASTIÁN	-67.09	9,96
46	4	SANTIAGO MARIÑO	-67.45	10,45
47	4	SANTOS MICHELENA	-67.47	10,33
48	4	SUCRE	-67.6	10,19
49	4	TOVAR	-67.37	10,45
50	4	URDANETA	-66.73	9,53
51	4	ZAMORA	-67.47	10,33
52	4	FRANCISCO LINARES ALCÁNTARA	-67.47	10,33
53	4	OCUMARE DE LA COSTA DE ORO	-67.47	10,33
54	5	ALBERTO ARVELO TORREALBA	-69.84	8,7
55	5	ANTONIO JOSÉ DE SUCRE	-70.91	8,09
56	5	ARISMENDI	-68.25	8,23
57	5	BARINAS	-70.18	8,61
58	5	BOLÍVAR	-70.51	8,87
59	5	CRUZ PAREDES	-70.3	8,92
60	5	EZEQUIEL ZAMORA	-71.16	7,79
61	5	OBISPOS	-70.04	8,61
62	5	PEDRAZA	-70.35	8,29
63	5	ROJAS	-69.65	8,54
64	5	SOSA	-69.15	8,16
65	5	ANDRÉS ELOY BLANCO	-70.25	8,6
66	16	CARONÍ	-62.9	8,16
67	16	CEDEÑO	-66.55	6,55
68	16	EL CALLAO	-61.39	7,99
69	16	GRAN SABANA	-62.46	5,87
70	16	HERES	-63.54	8,05
71	16	PIAR	-62.38	7,92
72	16	RAÚL LEONI	-64.05	5,61
73	16	ROSCIO	-61.94	7,77
74	16	SIFONTES	-61.04	7,68
75	16	SUCRE	-65.01	5,55
76	16	PADRE PEDRO CHIEN	-61.8	8,38
77	17	BEJUMA	-68.27	10,28
78	17	CARLOS ARVELO	-67.72	9,83
79	17	DIEGO IBARRA	-67.68	10,27
80	17	GUACARA	-67.89	10,24
81	17	JUAN JOSÉ MORA	-68.21	10,36
82	17	LIBERTADOR	-67.95	9,74
83	17	LOS GUAYOS	-67.88	10,11
84	17	MIRANDA	-68.39	10,14
85	17	MONTALBÁN	-68.3	10,2
86	17	NAGUANAGUA	-68.15	10,23
87	17	PUERTO CABELLO	-67.99	10,37
88	17	SAN DIEGO	-68.39	10,14
89	17	SAN JOAQUÍN	-67.78	10,26
90	17	VALENCIA	-68	10,17
91	18	ANZOÁTEGUI	-68.7	9,57
92	18	FALCÓN	-68.3	9,9
93	18	GIRARDOT	-68.3	8,95
94	18	LIMA BLANCO	-68.49	9,83
95	18	PAO DE SAN JUAN BAUTISTA	-68	9,21
96	18	RICAURTE	-68.75	9,37
97	18	RÓMULO GALLEGOS	-68.55	9,45
98	18	SAN CARLOS	-68.58	9,65
99	18	TINACO	-68.34	9,44
100	19	ANTONIO DÍAZ	-61.23	8,93
101	19	CASACOIMA	-62.33	8,62
102	19	PEDERNALES	-62.17	9,81
103	19	TUCUPITA	-62.02	9,05
105	7	ACOSTA	-68.36	11,06
106	7	BOLÍVAR	-69.71	11,11
107	7	BUCHIVACOA	-70.76	11,12
108	7	CACIQUE MANAURE	-68.57	10,88
109	7	CARIRUBANA	-70.02	11,71
110	7	COLINA	-69.55	11,44
111	7	DABAJURO	-70.53	10,69
112	7	DEMOCRACIA	-70.23	10,76
113	7	FALCÓN	-70.01	12,06
114	7	FEDERACIÓN	-69.76	10,8
115	7	JACURA	-68.89	10,94
116	7	LOS TAQUES	-70.22	11,94
117	7	MAUROA	-71.01	10,9
118	7	MIRANDA	-69.9	11,37
119	7	MONSEÑOR ITURRIZA	-68.3	10,93
120	7	PALMASOLA	-68.39	10,69
121	7	PETIT	-69.5	11,08
122	7	PÍRITU	-69.1	11,4
123	7	SAN FRANCISCO	-68.77	11,19
124	7	SILVA	-68.32	10,77
125	7	SUCRE	-69.91	11,18
126	7	TOCÓPERO	-69.27	11,52
127	7	UNIÓN	-69.31	10,78
128	7	URUMACO	-70.26	11,18
129	7	ZAMORA	-69.68	11,42
130	8	CAMAGUÁN	-67.48	8,28
131	8	CHAGUARAMAS	-66.22	9,49
132	8	EL SOCORRO	-65.61	9
133	8	SAN GERÓNIMO DE GUAYABAL	-66.74	7,8
134	8	LEONARDO INFANTE	-66	9,2
135	8	LAS MERCEDES	-66.48	8,54
136	8	JULIÁN MELLADO	-67.04	9,36
137	8	FRANCISCO DE MIRANDA	-67.4	8,9
138	8	JOSÉ TADEO MONAGAS	-66.36	9,84
139	8	ORTIZ	-67.53	9,67
140	8	JOSÉ FÉLIX RIBAS	-65.68	9,35
141	8	JUAN GERMÁN ROSCIO	-67.33	9,88
142	8	SAN JOSÉ DE GUARIBE	-65.73	9,76
143	8	SANTA MARÍA DE IPIRE	-65.23	8,59
144	8	PEDRO ZARAZA	-65.29	9,31
145	9	ANDRÉS ELOY BLANCO	-69.45	9,65
146	9	CRESPO	-69.1	10,49
147	9	IRIBARREN	-69.34	10,06
148	9	JIMÉNEZ	-69.62	9,9
149	9	MORÁN	-69.78	9,78
150	9	PALAVECINO	-69.24	10
151	9	SIMÓN PLANAS	-69.1	9,72
152	9	TORRES	-70.05	10,16
153	9	URDANETA	-69.58	10,59
154	10	ALBERTO ADRIANI	-71.63	8,61
155	10	ANDRÉS BELLO	-71.4	8,68
156	10	ANTONIO PINTO SALINAS	-71.63	8,39
157	10	ARICAGUA	-71.14	8,21
158	10	ARZOBISPO CHACÓN	-71.33	8,13
159	10	CAMPO ELÍAS	-71.22	8,54
160	10	CARACCIOLO PARRA OLMEDO	-71.26	8,9
161	10	CARDENAL QUINTERO	-70.69	8,87
162	10	GUARAQUE	-71.74	8,16
163	10	JULIO CÉSAR SALAS	-70.88	9,19
164	10	JUSTO BRICEÑO	-70.94	9,04
165	10	LIBERTADOR	-71.14	8,57
166	10	MIRANDA	-70.83	9,08
167	10	OBISPO RAMOS DE LORA	-71.4	8,76
168	10	PADRE NOGUERA	-71.45	7,76
169	10	PUEBLO LLANO	-70.64	8,91
170	10	RANGEL	-70.92	8,75
171	10	RIVAS DÁVILA	-71.83	8,27
172	10	SANTOS MARQUINA	-71.07	8,63
173	10	SUCRE	-71.42	8,52
174	10	TOVAR	-71.75	8,33
175	10	TULIO FEBRES CORDERO	-71.06	9,12
176	10	ZEA	-71.77	8,37
177	11	ACEVEDO	-66.29	10,39
178	11	ANDRÉS BELLO	-66.07	10,27
179	11	BARUTA	-66.85	10,46
180	11	BRIÓN	-66.1	10,47
181	11	BUROZ	-66.14	10,39
182	11	CARRIZAL	-66.96	10,37
183	11	CHACAO	-66.81	10,49
184	11	CRISTÓBAL ROJAS	-66.85	10,24
185	11	EL HATILLO	-66.82	10,42
186	11	GUAICAIPURO	-67.03	10,34
187	11	INDEPENDENCIA	-66.66	10,23
188	11	LANDER	-66.78	10,11
189	11	LOS SALIAS	-67.01	10,36
190	11	PÁEZ	-65.99	10,3
191	11	PAZ CASTILLO	-66.66	10,29
192	11	PEDRO GUAL	-65.54	10,1
193	11	PLAZA	-66.58	10,49
194	11	SIMÓN BOLÍVAR	-66.74	10,18
195	11	SUCRE	-66.65	10,5
196	11	URDANETA	-66.87	10,12
197	11	ZAMORA	-66.54	10,47
198	20	ACOSTA	-63.97	10,11
199	20	AGUASAY	-63.83	9,36
200	20	BOLÍVAR	-63.18	9,74
201	20	CARIPE	-63.5	10,16
202	20	CEDEÑO	-63.86	9,9
203	20	EZEQUIEL ZAMORA	-63.95	9,61
204	20	LIBERTADOR	-62.59	9,01
205	20	MATURÍN	-63.18	9,73
206	20	PIAR	-63.49	9,97
207	20	PUNCERES	-63.18	10,03
208	20	SANTA BÁRBARA	-63.61	9,61
209	20	SOTILLO	-62.38	8,67
210	20	URACOA	-62.34	8,96
211	21	ANTOLÍN DEL CAMPO	-63.88	11,15
212	21	ARISMENDI	-63.85	11,03
213	21	DÍAZ	-64	10,95
214	21	GARCÍA	-63.91	10,93
215	21	GÓMEZ	-63.92	11,09
216	21	MANEIRO	-63.79	10,98
217	21	MARCANO	-63.94	11,06
218	21	MARIÑO	-63.82	10,96
219	21	PENÍNSULA DE MACANAO	-64.34	11
220	21	TUBORES	-64.08	10,95
221	21	VILLALBA	-63.95	10,77
222	12	AGUA BLANCA	-69.1	9,72
223	12	ARAURE	-69.28	9,72
224	12	ESTELLER	-69.2	9,37
225	12	GUANARE	-69.74	9,03
226	12	GUANARITO	-68.82	8,39
227	12	MONSEÑOR JOSÉ VICENTE DE UNDA	-69.9	9,55
228	12	OSPINO	-69.46	9,29
229	12	PÁEZ	-69.21	9,55
230	12	PAPELÓN	-69.16	8,84
231	12	SAN GENARO DE BOCONOITO	-69.97	8,84
232	12	SAN RAFAEL DE ONOTO	-68.98	9,75
233	12	SANTA ROSALÍA	-68.88	8,87
234	12	SUCRE	-70.03	9,32
235	12	TURÉN	-69.1	9,32
236	22	ANDRÉS ELOY BLANCO	-63.29	10,29
237	22	ANDRÉS MATA	-63.33	10,49
238	22	ARISMENDI	-63.1	10,68
239	22	BENÍTEZ	-63.06	10,4
240	22	BERMÚDEZ	-63.24	10,66
241	22	BOLÍVAR	-64.02	10,36
242	22	CAJIGAL	-62.82	10,56
243	22	CRUZ SALMERÓN ACOSTA	-64.09	10,6
244	22	LIBERTADOR	-62.99	10,52
245	22	MARIÑO	-62.57	10,56
246	22	MEJÍA	-63.69	10,33
247	22	MONTES	-63.55	10,48
248	22	RIBERO	-64.15	10,46
249	22	SUCRE	-63.49	10,47
250	22	VALDEZ	-62.26	10,59
251	13	ANDRÉS BELLO	-72.2	7,85
252	13	ANTONIO RÓMULO COSTA	-72.13	8,17
253	13	AYACUCHO	-72.25	8,04
254	13	BOLÍVAR	-72.44	7,8
255	13	CÁRDENAS	-72.22	7,81
256	13	CÓRDOBA	-72.27	7,63
257	13	FERNÁNDEZ FEO	-71.91	7,49
258	13	FRANCISCO DE MIRANDA	-71.95	8,32
259	13	GARCÍA DE HEVIA	-72.24	8,21
260	13	GUÁSIMOS	-72.23	7,84
261	13	INDEPENDENCIA	-72.25	7,87
262	13	JÁUREGUI	-71.86	8,33
263	13	JOSÉ MARÍA VARGAS	-72.07	8,1
264	13	JUNÍN	-72.35	7,68
265	13	LIBERTAD	-72.39	7,81
266	13	LIBERTADOR	-71.51	7,61
267	13	LOBATERA	-72.24	7,93
268	13	MICHELENA	-72.24	7,95
269	13	PANAMERICANO	-72.05	8,52
270	13	PEDRO MARÍA UREÑA	-72.32	7,88
271	13	RAFAEL URDANETA	-72.42	7,49
272	13	SAMUEL DARÍO MALDONADO	-71.86	8,54
273	13	SAN CRISTÓBAL	-72.21	7,76
274	13	SEBORUCO	-72.06	8,13
275	13	SIMÓN RODRÍGUEZ	-71.8	8,42
276	13	SUCRE	-72.02	7,91
277	13	TORBES	-72.16	7,55
278	13	URIBANTE	-71.6	7,89
279	13	SAN JUDAS TADEO	-72.2	7,792
280	14	ANDRÉS BELLO	-70.77	9,56
281	14	BOCONÓ	-70.26	9,24
282	14	BOLÍVAR	-70.81	9,38
283	14	CANDELARIA	-70.34	9,62
284	14	CARACHE	-70.21	9,63
285	14	ESCUQUE	-70.67	9,3
286	14	JOSÉ FELIPE MÁRQUEZ CAÑIZALES	-70.51	9,79
287	14	JUAN VICENTE CAMPO ELÍAS	-70.12	9,37
288	14	LA CEIBA	-70.99	9,48
289	14	MIRANDA	-70.72	9,48
290	14	MONTE CARMELO	-70.84	9,17
291	14	MOTATÁN	-70.59	9,38
292	14	PAMPÁN	-70.47	9,44
293	14	PAMPANITO	-70.51	9,4
294	14	RAFAEL RANGEL	-70.73	9,37
295	14	SAN RAFAEL DE CARVAJAL	-70.58	9,35
296	14	SUCRE	-70.77	9,43
297	14	TRUJILLO	-70.43	9,37
298	14	URDANETA	-70.61	9,13
299	14	VALERA	-70.61	9,31
300	23	ARÍSTIDES BASTIDAS	-68.85	10,24
301	23	BOLÍVAR	-68.88	10,43
302	23	BRUZUAL	-68.89	10,15
303	23	COCOROTE	-68.78	10,24
304	23	INDEPENDENCIA	-68.77	10,28
305	23	JOSÉ ANTONIO PÁEZ	-69	10,06
306	23	LA TRINIDAD	-68.81	10,2
307	23	MANUEL MONGE	-68.77	10,66
308	23	NIRGUA	-68.56	10,14
309	23	PEÑA	-69.13	10,06
310	23	SAN FELIPE	-68.74	10,33
311	23	SUCRE	-68.84	10,27
312	23	URACHICHE	-69.01	10,15
313	23	VEROES	-68.61	10,44
314	15	VARGAS	-66.92	10,58
315	24	ALMIRANTE PADILLA	-71.65	11
316	24	BARALT	-71.06	9,86
317	24	CABIMAS	-71.46	10,41
318	24	CATATUMBO	-72.21	9,05
319	24	COLÓN	-71.88	9,02
320	24	FRANCISCO JAVIER PULGAR	-71.61	8,92
321	24	JESÚS ENRIQUE LOSSADA	-72.22	10,69
322	24	JESÚS MARÍA SEMPRÚN	-72.74	9,24
323	24	LA CAÑADA DE URDANETA	-71.9	10,43
324	24	LAGUNILLAS	-71.24	10,13
325	24	MACHIQUES DE PERIJÁ	-72.53	10,04
326	24	MARA	-72.33	11,01
327	24	MARACAIBO	-71.61	10,63
328	24	MIRANDA	-71.27	10,85
329	24	PÁEZ	-72.03	11,37
330	24	ROSARIO DE PERIJÁ	-72.32	10,33
331	24	SAN FRANCISCO	-71.63	10,5
332	24	SANTA RITA	-71.47	10,5
333	24	SIMÓN BOLÍVAR	-71.29	10,18
334	24	SUCRE	-71.14	9,14
335	24	VALMORE RODRÍGUEZ	-71.21	10,03
104	6	LIBERTADOR	-66.9	10,5
\.


--
-- TOC entry 2150 (class 0 OID 43906)
-- Dependencies: 177 2188
-- Data for Name: e_organizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_organizacion (id_org, id_tipo_org, organizacion, estatus) FROM stdin;
186	1	C.C.Tres Raices	1
1	1	Consejo Comunal Con La Uni&oacute;n La Nueva Esperanza. 	1
2	1	Consejo Comunal Pérez Bonalde 	1
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
27	1	Cc Antonio José De Sucre 	1
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
83	1	Máxima Expresi&oacute;n Floreña 	1
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
101	2	Casco Central (Candelaria),Comuna La Tita (San José) 	1
102	2	Comuna Amalivaca 	1
103	2	Comuna En Construcci&oacute;n Estrella Del Sur 	1
104	2	Manuel Ezequiel Bruzual 	1
105	2	Ali Primera 	1
106	2	Comuna Sim&oacute;n Bol&iacute;var 	1
107	2	Unidos Venceremos 	1
108	2	Maisanta 	1
109	2	La Veguita 	1
110	2	Luisa Cáceres De Arismendi 	1
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
122	2	Sueño Revolucion 	1
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
169	3	Sueño Revolucion	1
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
\.


--
-- TOC entry 2151 (class 0 OID 43910)
-- Dependencies: 178 2188
-- Data for Name: e_parroquia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_parroquia (id, id_geo_municipio, texto, latitud, longitud, id_circuito) FROM stdin;
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
13	3	PARHUEÑA	0	0	0
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
107	35	PEÑALVER	0	0	0
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
130	43	CAÑA DE AZUCAR	0	0	0
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
148	50	LAS PEÑITAS	0	0	0
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
190	60	PEDRO BRICEÑO MENDEZ	0	0	0
191	60	RAMON IGNACIO MENDEZ	0	0	0
192	60	SANTA BARBARA	0	0	0
193	61	EL REAL	0	0	0
194	61	LA LUZ	0	0	0
195	61	LOS GUASIMITOS	0	0	0
196	61	OBISPOS	0	0	0
197	62	CIUDAD BOLIVIA	0	0	0
198	62	IGNACIO BRICEÑO	0	0	0
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
290	90	MIGUEL PEÑA	0	0	0
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
359	106	LA PEÑA	0	0	0
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
516	152	CASTAÑEDA	0	0	0
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
554	159	FERNANDEZ PEÑA	0	0	0
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
574	165	DOMINGO PEÑA	0	0	0
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
588	166	PIÑANGO	0	0	0
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
617	176	CAÑO EL TIGRE	0	0	0
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
746	225	SAN JOSE DE LA MONTAÑA	0	0	0
747	225	SAN JUAN GUANAGUANARE	0	0	0
748	225	VIRGEN DE LA COROMOTO	0	0	0
749	226	DIVINA PASTORA	0	0	0
750	226	GUANARITO	0	0	0
751	226	TRINIDAD DE LA CAPILLA	0	0	0
752	227	CHABASQUEN	0	0	0
753	227	PEÑA BLANCA	0	0	0
754	228	APARICION	0	0	0
755	228	LA ESTACION	0	0	0
756	228	OSPINO	0	0	0
757	229	ACARIGUA	0	0	0
758	229	PAYARA	0	0	0
759	229	PIMPINELA	0	0	0
760	229	RAMON PERAZA	0	0	0
761	230	CAÑO DELGADITO	0	0	0
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
780	236	MARIÑO	0	0	0
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
882	270	UREÑA	0	0	0
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
899	278	JUAN PABLO PEÑALOZA	0	0	0
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
914	281	MONSEÑOR JAUREGUI	0	0	0
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
955	291	EL BAÑO	0	0	0
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
969	295	ANTONIO N BRICEÑO	0	0	0
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
982	297	MONSEÑOR CARRILLO	0	0	0
983	297	TRES ESQUINAS	0	0	0
984	298	CABIMBU	0	0	0
985	298	JAJO	0	0	0
986	298	LA MESA	0	0	0
987	298	LA QUEBRADA	0	0	0
988	298	SANTIAGO	0	0	0
989	298	TUÑAME	0	0	0
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
1023	316	MARCELINO BRICEÑO	0	0	0
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
1134	314	NAIGUATÁ	0	0	0
1135	314	RAUL LEONI	0	0	0
1136	314	CARLOS SOUBLETTE	0	0	0
\.


--
-- TOC entry 2152 (class 0 OID 43913)
-- Dependencies: 179 2188
-- Data for Name: e_tipo_organizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY e_tipo_organizacion (id_tipo_org, tipo_org, estatus) FROM stdin;
1	Consejo Comunal	1
2	Comuna	1
3	Movimiento	1
4	Gobierno Parroquial	1
5	Colectivo	1
6	Eje Comunal	1
\.


--
-- TOC entry 2230 (class 0 OID 0)
-- Dependencies: 180
-- Name: e_tipo_organizacion_id_tipo_org_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('e_tipo_organizacion_id_tipo_org_seq', 1, false);


--
-- TOC entry 2154 (class 0 OID 43919)
-- Dependencies: 181 2188
-- Data for Name: e_unidades_Tiempo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "e_unidades_Tiempo" ("idUnidadTiempo", "descUnidadTiempo", "estatusUnidadTiempo") FROM stdin;
1	Hora(s)	1
2	Dia(s)	1
3	Semana(s)	1
4	Mes(es)	1
5	Año(s)	1
\.


--
-- TOC entry 2231 (class 0 OID 0)
-- Dependencies: 182
-- Name: e_unidades_Tiempo_idUnidadTiempo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"e_unidades_Tiempo_idUnidadTiempo_seq"', 5, true);


--
-- TOC entry 2232 (class 0 OID 0)
-- Dependencies: 183
-- Name: geo_estado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('geo_estado_id_seq', 25, false);


--
-- TOC entry 2233 (class 0 OID 0)
-- Dependencies: 184
-- Name: geo_municipio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('geo_municipio_id_seq', 336, false);


--
-- TOC entry 2234 (class 0 OID 0)
-- Dependencies: 185
-- Name: geo_parroquia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('geo_parroquia_id_seq', 1136, false);


--
-- TOC entry 2159 (class 0 OID 43931)
-- Dependencies: 186 2188
-- Data for Name: v_financiamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_financiamiento (id_financiamiento, id_proyecto, obj_financiamiento, id_ente_financiamiento, id_estatus_financiamiento, monto, monto_aprobado, monto_transferido, monto_pendiente, anio_financiamiento, tipo_financiamiento, estatus_tabla_financiamiento) FROM stdin;
16	15	\N	3	2	650000	650000	650.000,00		2011	principal	1
17	16	\N	3	2	650000	650000	650.000,00		2011	principal	1
18	17	\N	3	2	477250,51	477250,51	477.250,51		2011	principal	1
19	18	\N	3	2	650000	650000	650.000,00		2011	principal	1
20	19	\N	3	2	636447	636447	636.447,00		2011	principal	1
21	20	\N	3	2	351966	351966	351.966,00		2011	principal	1
22	21	\N	3	2	3122044	3122044	2.683.247,54		2011	principal	1
23	22	\N	2	2	604590,7	604590,7	604.590,70	0,00	2011	principal	1
24	23	\N	3	2	168609,26	168609,26	0,00	168.609,26	2012	principal	1
25	24	\N	3	2	1674565,54	1674565,54	552.000,00	1.122.565,54	2012	principal	1
26	25	\N	3	2	932747	932747	465.747,00	467.000,00	2012	principal	1
27	26	\N	3	2	686175,38	686175,38	415.047,98	271.127,40	2012	principal	1
28	27	\N	3	2	993260,5	993260,5	481.656,00	511.604,50	2012	principal	1
29	28	\N	3	2	933872,76	933872,76	591.364,00	342.508,76	2012	principal	1
30	29	\N	3	2	850000	850000	0,00	850.000,00	2012	principal	1
31	30	\N	3	2	400000	400000	0,00	400.000,00	2012	principal	1
32	31	\N	3	2	650000	650000	650.000,00		2011	principal	1
33	32	\N	3	2	650000	650000	650.000,00		2011	principal	1
34	33	\N	3	2	650000	650000	650.000,00		2011	principal	1
35	34	\N	3	2	1214846	1214846	1.214.846,00		2011	principal	1
36	35	\N	3	2	650000	650000	650.000,00		2011	principal	1
37	36	\N	3	2	650000	650000	650.000,00		2011	principal	1
38	37	\N	2	2	844600	844600	646.760,39	197.839,61	2011	principal	1
39	38	\N	2	2	1086000	1086000	0,00	1.086.000,00	2012	principal	1
40	39	\N	2	2	913000	913000	0,00	913.000,00	2012	principal	1
41	40	\N	2	2	700000	700000	700.000,00	0,00	2012	principal	1
42	41	\N	8	5		0	0,00	0,00		principal	1
43	42	\N	3	2	312474,04	312474,04	155.238,84	157.235,20	2012	principal	1
44	43	\N	3	2	997189,06	997189,06	727.576,84	269.612,22	2012	principal	1
45	44	\N	3	2	679590	679590	679.590,00	0,00	2012	principal	1
46	45	\N	3	2	1948302,37	1948302,37	800.000,00	1.148.302,37	2012	principal	1
47	46	\N	3	2	548252	548252	548.252,00	0,00	2012	principal	1
48	47	\N	3	2	1070843,47	1070843,47	416.718,57	654.124,90	2012	principal	1
49	48	\N	3	2	1652090	1652090	1.652.090,00	0,00	2012	principal	1
50	49	\N	3	2		650000	177.284,00		2011	principal	1
51	50	\N	3	2		498417	199.260,00		2011	principal	1
52	51	\N	2	2	1200000	1200000	1.200.000,00	0,00	2011	principal	1
53	52	\N	1	2	800000	800000	0,00	800.000,00	2012	principal	1
54	53	\N	1	2	700000	700000	0,00	700.000,00	2012	principal	1
55	54	\N	6	2	1147	1147	1.147,00	0,00	2011	principal	1
56	55	\N	2	2	1300000	1300000	0,00	1.300.000,00	2012	principal	1
57	56	\N	6	2	835000	835000	835.000,00	0,00	2011	principal	1
58	57	\N	3	2	422613,4	422613,4	336.801,50	85.811,90	2012	principal	1
59	58	\N	3	2	910704,91	910704,91	325.000,00	585.704,91	2012	principal	1
60	59	\N	3	2	69615,8	69615,8	0,00	69.615,80	2012	principal	1
61	60	\N	3	2	783001,82	783001,82	0,00	783.001,82	2012	principal	1
62	61	\N	3	2	349108,88	349108,88	349.108,88	0,00	2012	principal	1
63	62	\N	3	2	961528,2	961528,2	542.498,00	419.030,20	2012	principal	1
64	63	\N	3	2	617050,74	617050,74	491.893,45	125.157,29	2012	principal	1
65	64	\N	3	2	290000	290000	290.000,00		2011	principal	1
66	65	\N	3	2	546900	546900	546.900,00		2011	principal	1
67	66	\N	3	2	216666,67	216666,67	216.666,67		2011	principal	1
68	67	\N	3	2	216666,67	216666,67	216.666,67		2011	principal	1
69	68	\N	3	2	216666,67	216666,67	216.666,67		2011	principal	1
70	69	\N	3	2	650000	650000	650.000,00		2011	principal	1
71	70	\N	3	2	650000	650000	650.000,00		2011	principal	1
72	71	\N	2	2	620000	620000	620.000,00	0,00	2012	principal	1
73	72	\N	1	2	500000	500000	0,00	500.000,00	2012	principal	1
74	73	\N	2	2	133780	133780	133.780,00	0,00	2012	principal	1
75	74	\N	2	2	2250000	2250000	2.250.000,00	0,00	2012	principal	1
76	75	\N	7	2	999600	999600	0,00	999.600,00	2011	principal	1
77	76	\N	1	2	1000000	1000000	0,00	1.000.000,00	2012	principal	1
78	77	\N	1	2	400	400	0,00	400,00	2012	principal	1
79	78	\N	2	2	279965,16	279965,16	279.965,16	0,00	2011	principal	1
80	79	\N	3	2	662889	662889	432.389,00	230.500,00	2012	principal	1
3	2	\N	2	2	1.309.348	1.309.348	1.309.348	0	2011	principal	1
7	6	\N	3	2	1.510.554	1.510.554	653.854	856.699	2012	principal	1
6	5	\N	3	2	2.201.305	2.201.305	837.656	1.363.648	2012	principal	1
5	4	\N	1	2	1.287.224	1.287.224	1.287.224	0	2012	principal	1
8	7	\N	3	2	1.164.431	1.164.431	369.525	794.905	2012	principal	1
9	8	\N	3	2	2.037.432	2.037.432	846.621	1.190.811	2012	principal	1
10	9	\N	3	2	1.496.940	1.496.940	683.658	813.282	2012	principal	1
12	11	\N	3	2	1.333.677	1.333.677	865.750	467.927	2012	principal	1
13	12	\N	3	2	841.731	841.731	0	841.731	2012	principal	1
14	13	\N	3	2	535.000	535.000	535.000		2011	principal	1
15	14	\N	3	2	650.000	650.000	650.000		2011	principal	1
81	80	\N	3	2	639947,13	639947,13	536.358,13	103.589,00	2012	principal	1
82	81	\N	3	2	485556,5	485556,5	303.500,00	182.056,50	2012	principal	1
83	82	\N	3	2	667379,1	667379,1	200.400,00	466.979,10	2012	principal	1
84	83	\N	3	2	1012400	650000	650.000,00	362.400,00	2011	principal	1
85	84	\N	3	2	323640,32	323640,32	193.480,00	130.160,32	2012	principal	1
86	85	\N	3	2	806552,89	806552,89	523.050,00	283.502,89	2012	principal	1
87	86	\N	3	2	680312,77	680312,77	245.000,00	435.312,77	2012	principal	1
88	87	\N	3	2	1094230,36	1094230,36	320.000,00	774.230,36	2012	principal	1
89	88	\N	3	2	700000	700000	0,00	700.000,00	2012	principal	1
90	89	\N	3	2	800000	800000	0,00	800.000,00	2012	principal	1
91	90	\N	3	2	900000	900000	0,00	900.000,00	2012	principal	1
92	91	\N	3	2	453381,04	453381,04	282.500,00	170.881,04	2012	principal	1
93	92	\N	3	2	697000	697000	492.303,44	204.696,56	2012	principal	1
94	93	\N	3	2	3808100	3808100	1.439.140,00	2.368.960,00	2012	principal	1
95	94	\N	3	2	279335,26	279335,26	165.266,05	114.069,21	2012	principal	1
96	95	\N	3	2	691108	691108	314.700,00	376.408,00	2012	principal	1
97	96	\N	3	2	1456752,14	1456752,14	757.919,80	698.832,34	2012	principal	1
98	97	\N	3	2	2436014,31	2436014,31	969.796,08	1.466.218,23	2012	principal	1
99	98	\N	3	2	1082079	1082079	653.379,65	428.699,35	2012	principal	1
100	99	\N	3	2	221150	221150	221.150,00	0,00	2012	principal	1
101	100	\N	3	2	1325552	1325552	483.812,00	841.740,00	2012	principal	1
102	101	\N	3	2	401121	401121	297.171,00	103.950,00	2012	principal	1
103	102	\N	3	2	1400919,72	1400919,72	0,00	1.400.919,72	2012	principal	1
104	103	\N	3	2	1319030	1319030	0,00	1.319.030,00	2012	principal	1
105	104	\N	3	2	300000	300000	0,00	300.000,00	2012	principal	1
106	105	\N	3	2	1100000	1100000	0,00	1.100.000,00	2012	principal	1
107	106	\N	3	2	325000	325000	0,00	325.000,00	2012	principal	1
108	107	\N	3	2	831436,18	831436,18	0,00	831.436,18	2012	principal	1
109	108	\N	3	2	650000	650000	650.000,00		2011	principal	1
110	109	\N	3	2	650000	650000	650.000,00		2011	principal	1
111	110	\N	3	2	620000	620000	620.000,00		2011	principal	1
112	111	\N	3	2	650.000.00	65.000.00	620.000.00		2011	principal	1
113	112	\N	3	2	2319600	650000			2011	principal	1
114	113	\N	3	2	890560	890560	890.560,00		2011	principal	1
115	114	\N	3	2	325000	325000	325.000,00		2011	principal	1
116	115	\N	3	2	650,000,00	650000	650.000,00		2011	principal	1
120	2	\N	2	2	1.900.000,00	1900000	1.900.000,00	0,00	2012	adicional	1
122	73	\N	2	2	471.220,00	471220	471.220,00	0,00	2012	adicional	1
123	83	\N	3	2	362.400,00	362400	181.500,00	180.900,00	2012	adicional	1
126	10	CENTRO DE ABASTECIMIENTO SOCIALISTA ERNESTO CHE GUEVARA (CAS)	2	2	8944040	1500000	1.500.000	7.444.040,00	2012	Principal	1
127	10	CENTRO DE ABASTECIMIENTO SOCIALISTA ERNESTO CHE GUEVARA (CAS)	3	2	1919982,37	1919982,37	1.068.000,37	851.982,00	2012	adicional	1
130	3	Café Caracas Catia 	1	2	400000	400000	0,00	400.000,00	2012	Principal	1
139	1	Manos A La Siembra	2	2	1.500.000	1.500.000	1.500.000	0	2011	Principal	1
140	1	Manos A La Siembra	3	2	1.200.000,00	1200000	0,00	1.200.000,00	2012	adicional	1
\.


--
-- TOC entry 2235 (class 0 OID 0)
-- Dependencies: 187
-- Name: v_financiamiento_id_financiamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_financiamiento_id_financiamiento_seq', 140, true);


--
-- TOC entry 2161 (class 0 OID 43936)
-- Dependencies: 188 2188
-- Data for Name: v_fotos_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_fotos_proyecto (id_registro, id_proyecto, nombre_archivo, descripcion_archivo, estatus_tabla) FROM stdin;
\.


--
-- TOC entry 2236 (class 0 OID 0)
-- Dependencies: 189
-- Name: v_fotos_proyecto_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_fotos_proyecto_id_registro_seq', 115, true);


--
-- TOC entry 2163 (class 0 OID 43945)
-- Dependencies: 190 2188
-- Data for Name: v_historico_ingreso_exitoso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_historico_ingreso_exitoso (id, usuario, direccion_ip, nombre_maquina, fecha, hora) FROM stdin;
2	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-10	16:34:05
3	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	08:55:21
4	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrollo2                                       	admin                                                                                                                                                                                                   	2012-12-11	12:40:06
5	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:05:43
6	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:08:02
7	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:25:04
8	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:35:14
9	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:36:05
10	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:36:30
11	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:36:54
12	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	14:37:20
13	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	15:50:51
14	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-11	16:59:29
15	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2012-12-12	08:48:12
16	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-12	09:59:10
17	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-12	16:06:02
18	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2012-12-13	08:37:38
19	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2012-12-13	10:57:23
20	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-13	11:22:04
21	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-13	12:08:27
22	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-13	12:47:50
23	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-13	13:33:24
24	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-13	13:49:22
25	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2012-12-13	14:50:19
26	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-13	15:16:59
27	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-14	09:10:16
28	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-14	12:59:43
29	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	09:03:42
30	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	09:32:26
31	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	09:39:35
32	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	09:46:31
33	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	09:51:09
34	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	10:22:14
35	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	10:23:30
36	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	10:26:54
37	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	10:28:58
38	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-17	15:45:19
39	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-18	11:48:28
40	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	172.16.0.144                                      	admin                                                                                                                                                                                                   	2012-12-21	10:07:26
41	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	172.16.0.144                                      	admin                                                                                                                                                                                                   	2012-12-21	10:48:22
42	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2012-12-21	11:08:01
43	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-02	12:31:01
44	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	172.16.0.144                                      	admin                                                                                                                                                                                                   	2013-01-02	12:36:07
45	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-07	08:09:44
46	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-01-07	10:38:14
47	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-08	08:34:52
48	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-09	08:55:09
49	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-11	08:57:03
50	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-01-14	14:10:08
51	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-14	14:59:43
52	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-01-15	09:48:39
53	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-01-15	10:49:53
54	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	172.16.0.144                                      	admin                                                                                                                                                                                                   	2013-01-15	12:15:28
55	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	172.16.0.144                                      	admin                                                                                                                                                                                                   	2013-01-15	14:08:42
56	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-15	14:14:12
57	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-16	12:31:38
58	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-16	12:46:14
59	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-16	12:54:50
60	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-16	12:57:03
61	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-16	12:58:27
62	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-16	14:35:28
63	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-16	15:40:26
64	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	09:07:07
65	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	11:32:36
66	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	11:32:45
67	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	11:36:30
68	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	12:07:20
69	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	12:08:01
70	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	12:11:41
71	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-17	14:39:27
72	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:26:18
73	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:33:20
74	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:36:31
75	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:39:12
76	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:42:34
77	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:47:19
78	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:49:53
79	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:51:38
80	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:56:29
81	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	09:58:29
82	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	10:18:23
83	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	10:31:50
84	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	11:38:46
85	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	14:20:22
86	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	15:03:58
87	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-18	15:41:44
88	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-01-21	09:09:49
89	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-21	13:38:12
90	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-21	14:41:24
91	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-22	10:05:25
92	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-22	10:30:21
93	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-22	10:32:51
94	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-22	10:34:44
95	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-22	10:35:27
96	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-22	14:39:42
97	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-24	14:52:39
98	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-28	14:37:37
99	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-01-29	10:05:42
100	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-01-29	11:14:21
101	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-01-29	12:19:34
102	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-29	13:47:39
103	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-01-29	14:10:42
104	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-29	14:24:46
105	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-29	14:26:20
106	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrollo2.0.16.172.in-addr.arpa                 	admin                                                                                                                                                                                                   	2013-01-30	09:03:26
107	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-30	11:32:28
108	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-01-30	14:34:47
109	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-02-04	09:53:38
110	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-02-04	09:55:26
111	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-02-04	10:01:48
112	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-02-04	10:50:02
113	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrollo2.0.16.172.in-addr.arpa                 	admin                                                                                                                                                                                                   	2013-02-04	11:44:23
114	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-02-04	14:18:05
115	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-02-06	10:28:30
116	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-02-06	11:44:09
117	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-02-06	15:40:13
118	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-02-07	09:36:52
119	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-02-08	09:46:31
120	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-02-08	11:41:12
121	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	desarrolo2.local                                  	admin                                                                                                                                                                                                   	2013-02-08	12:32:01
122	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-04	10:28:13
123	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-04	10:42:03
124	12                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      	localhost                                         	luis                                                                                                                                                                                                    	2013-03-04	10:45:36
125	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-05	09:13:12
126	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-05	12:01:20
127	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-05	14:10:57
128	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-05	15:14:30
129	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-11	13:51:01
130	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-11	14:43:34
131	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-11	14:46:34
132	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-11	15:17:48
133	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-12	09:06:28
134	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-12	10:09:53
135	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-12	14:40:13
136	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-13	09:17:33
137	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-13	10:52:45
138	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-03-26	14:06:04
139	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-04-26	16:19:59
140	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-04-29	08:50:01
141	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-04-29	09:53:04
142	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-04-29	11:20:53
143	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-04-29	11:26:31
144	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-04-29	13:48:09
145	3                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	carrizales                                                                                                                                                                                              	2013-04-29	14:59:09
146	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	localhost                                         	admin                                                                                                                                                                                                   	2013-04-29	14:59:56
147	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	15:54:53
148	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	16:01:01
149	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	16:02:05
150	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	16:03:40
151	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	16:05:51
152	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	16:07:28
153	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	16:16:48
154	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-29	16:18:03
155	6                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	soto                                                                                                                                                                                                    	2013-04-29	16:23:02
156	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-30	09:11:42
157	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-30	13:40:31
158	1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       	sistemas1.local                                   	admin                                                                                                                                                                                                   	2013-04-30	16:24:12
\.


--
-- TOC entry 2237 (class 0 OID 0)
-- Dependencies: 191
-- Name: v_historico_ingreso_exitoso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_historico_ingreso_exitoso_id_seq', 158, true);


--
-- TOC entry 2165 (class 0 OID 43953)
-- Dependencies: 192 2188
-- Data for Name: v_historico_ingreso_fallido; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_historico_ingreso_fallido (id, usuario, direccion_ip, nombre_maquina, fecha, hora) FROM stdin;
2	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2012-12-10	16:33:59
3	admin                                             	172.16.0.101        	desarrollo2                                                                                                                                                                                             	2012-12-11	12:40:01
4	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2012-12-11	14:07:58
5	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2012-12-12	16:05:53
6	admin                                             	172.16.0.101        	desarrolo2.local                                                                                                                                                                                        	2012-12-13	08:25:01
7	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2012-12-13	11:21:59
8	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2012-12-14	12:59:37
9	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2012-12-21	11:07:54
10	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2013-01-02	12:30:57
11	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2013-01-22	10:30:16
12	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2013-01-22	14:39:21
13	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2013-01-22	14:39:36
14	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2013-01-29	13:47:35
15	admin                                             	192.168.1.24        	desarrolo2.local                                                                                                                                                                                        	2013-02-07	09:36:47
16	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2013-03-04	10:28:08
17	admin                                             	127.0.0.1           	localhost                                                                                                                                                                                               	2013-04-26	16:19:54
\.


--
-- TOC entry 2238 (class 0 OID 0)
-- Dependencies: 193
-- Name: v_historico_ingreso_fallido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_historico_ingreso_fallido_id_seq', 17, true);


--
-- TOC entry 2167 (class 0 OID 43958)
-- Dependencies: 194 2188
-- Data for Name: v_org_comunitarias_sociales_vinculadas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_org_comunitarias_sociales_vinculadas (id_registro, id_proyecto, id_tipo_org, id_org, estatus_tabla) FROM stdin;
2	4	1	83	1
3	5	1	84	1
4	6	1	1	1
5	7	1	85	1
6	8	1	2	1
7	9	1	3	1
9	11	1	5	1
10	13	1	6	1
11	14	1	7	1
12	15	1	75	1
13	16	1	8	1
14	17	1	9	1
15	19	1	10	1
16	20	1	77	1
17	21	1	7	1
18	25	1	11	1
19	26	1	12	1
20	27	1	13	1
21	37	1	14	1
22	37	1	15	1
23	37	1	16	1
24	37	1	17	1
25	42	1	18	1
26	51	1	45	1
27	51	1	46	1
28	51	1	47	1
29	51	1	48	1
30	51	1	49	1
31	51	1	50	1
32	51	1	51	1
33	51	1	52	1
34	51	1	53	1
35	58	1	21	1
36	59	1	22	1
37	61	1	186	1
38	63	1	23	1
39	64	1	84	1
40	65	1	78	1
41	73	1	24	1
42	76	1	25	1
43	77	1	26	1
44	77	1	27	1
45	78	1	28	1
46	82	1	29	1
47	83	1	30	1
48	84	1	31	1
49	85	1	32	1
50	91	1	33	1
51	93	1	34	1
52	93	1	35	1
53	93	1	37	1
54	94	1	36	1
55	95	1	38	1
56	97	1	39	1
57	98	1	40	1
58	99	1	41	1
59	99	1	42	1
60	106	1	43	1
61	108	1	44	1
62	2	2	91	1
63	4	2	87	1
64	13	2	88	1
65	14	2	89	1
66	15	2	90	1
67	16	2	91	1
68	17	2	92	1
69	18	2	93	1
70	21	2	94	1
71	22	2	95	1
72	23	2	99	1
73	24	2	100	1
74	25	2	96	1
75	26	2	97	1
76	27	2	99	1
77	29	2	99	1
78	31	2	98	1
79	33	2	99	1
80	34	2	99	1
81	35	2	100	1
82	41	2	101	1
83	49	2	102	1
84	53	2	103	1
85	54	2	104	1
86	56	2	104	1
87	61	2	105	1
88	63	2	105	1
89	66	2	106	1
90	67	2	106	1
91	68	2	106	1
92	71	2	117	1
93	72	2	107	1
94	74	2	107	1
95	75	2	109	1
96	76	2	110	1
97	77	2	105	1
98	80	2	111	1
99	81	2	111	1
100	82	2	112	1
101	84	2	114	1
102	85	2	114	1
103	86	2	110	1
104	87	2	113	1
105	88	2	115	1
106	89	2	114	1
107	90	2	115	1
108	91	2	116	1
109	94	2	111	1
110	95	2	114	1
111	99	2	117	1
112	100	2	117	1
113	101	2	118	1
114	102	2	119	1
115	103	2	119	1
116	104	2	119	1
117	106	2	112	1
118	107	2	119	1
119	108	2	121	1
120	109	2	111	1
121	115	2	107	1
122	12	3	169	1
123	18	3	170	1
124	19	3	171	1
125	20	3	172	1
126	23	3	173	1
127	24	3	174	1
128	26	3	175	1
129	28	3	176	1
130	29	3	173	1
131	30	3	177	1
132	31	3	178	1
133	32	3	179	1
134	33	3	173	1
135	34	3	173	1
136	35	3	180	1
137	36	3	181	1
138	37	3	182	1
139	38	3	183	1
140	39	3	183	1
141	40	3	184	1
142	43	3	185	1
143	44	3	138	1
144	45	3	139	1
145	46	3	140	1
146	47	3	140	1
147	48	3	140	1
148	49	3	160	1
149	50	3	141	1
150	53	3	142	1
151	60	3	143	1
152	62	3	144	1
153	64	3	145	1
154	65	3	146	1
155	66	3	147	1
156	67	3	147	1
157	68	3	147	1
158	69	3	148	1
159	70	3	149	1
160	74	3	150	1
161	79	3	151	1
162	80	3	152	1
163	81	3	152	1
164	86	3	153	1
165	87	3	154	1
166	88	3	155	1
167	89	3	156	1
168	90	3	157	1
169	96	3	158	1
170	100	3	159	1
171	101	3	160	1
172	102	3	161	1
173	103	3	161	1
174	104	3	162	1
175	105	3	163	1
176	109	3	152	1
177	110	3	168	1
178	111	3	164	1
179	112	3	165	1
180	113	3	155	1
181	114	3	166	1
182	115	3	167	1
184	10	1	4	1
187	3	1	83	1
190	1	2	87	1
\.


--
-- TOC entry 2239 (class 0 OID 0)
-- Dependencies: 195
-- Name: v_org_comunitarias_sociales_vinculadas_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_org_comunitarias_sociales_vinculadas_id_registro_seq', 190, true);


--
-- TOC entry 2240 (class 0 OID 0)
-- Dependencies: 196
-- Name: v_organizacion_id_org_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_organizacion_id_org_seq', 1, false);


--
-- TOC entry 2170 (class 0 OID 43966)
-- Dependencies: 197 2188
-- Data for Name: v_produccion_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_produccion_proyecto (id_produccion_proyecto, id_proyecto, estatus_produccion, fecha_produccion, prod_principal, meta_produccion, estatus_tabla_produccion) FROM stdin;
2	2	0	2013-01-01	vacio	vacio	1
3	3	0	2013-01-01	vacio	vacio	1
4	4	0	2013-01-01	vacio	vacio	1
5	5	0	2013-01-01	vacio	vacio	1
6	6	0	2013-01-01	vacio	vacio	1
7	7	0	2013-01-01	vacio	vacio	1
8	8	0	2013-01-01	vacio	vacio	1
9	9	0	2013-01-01	vacio	vacio	1
10	10	0	2013-01-01	vacio	vacio	1
11	11	0	2013-01-01	vacio	vacio	1
12	12	0	2013-01-01	vacio	vacio	1
13	13	0	2013-01-01	vacio	vacio	1
14	14	0	2013-01-01	vacio	vacio	1
15	15	0	2013-01-01	vacio	vacio	1
16	16	0	2013-01-01	vacio	vacio	1
17	17	0	2013-01-01	vacio	vacio	1
18	18	0	2013-01-01	vacio	vacio	1
19	19	0	2013-01-01	vacio	vacio	1
20	20	0	2013-01-01	vacio	vacio	1
21	21	0	2013-01-01	vacio	vacio	1
22	22	0	2013-01-01	vacio	vacio	1
23	23	0	2013-01-01	vacio	vacio	1
24	24	0	2013-01-01	vacio	vacio	1
25	25	0	2013-01-01	vacio	vacio	1
26	26	0	2013-01-01	vacio	vacio	1
27	27	0	2013-01-01	vacio	vacio	1
28	28	0	2013-01-01	vacio	vacio	1
29	29	0	2013-01-01	vacio	vacio	1
30	30	0	2013-01-01	vacio	vacio	1
31	31	0	2013-01-01	vacio	vacio	1
32	32	0	2013-01-01	vacio	vacio	1
33	33	0	2013-01-01	vacio	vacio	1
34	34	0	2013-01-01	vacio	vacio	1
35	35	0	2013-01-01	vacio	vacio	1
36	36	0	2013-01-01	vacio	vacio	1
37	37	0	2013-01-01	vacio	vacio	1
38	38	0	2013-01-01	vacio	vacio	1
39	39	0	2013-01-01	vacio	vacio	1
40	40	0	2013-01-01	vacio	vacio	1
41	41	0	2013-01-01	vacio	vacio	1
42	42	0	2013-01-01	vacio	vacio	1
43	43	0	2013-01-01	vacio	vacio	1
44	44	0	2013-01-01	vacio	vacio	1
45	45	0	2013-01-01	vacio	vacio	1
46	46	0	2013-01-01	vacio	vacio	1
47	47	0	2013-01-01	vacio	vacio	1
48	48	0	2013-01-01	vacio	vacio	1
49	49	0	2013-01-01	vacio	vacio	1
50	50	0	2013-01-01	vacio	vacio	1
51	51	0	2013-01-01	vacio	vacio	1
52	52	0	2013-01-01	vacio	vacio	1
53	53	0	2013-01-01	vacio	vacio	1
54	54	0	2013-01-01	vacio	vacio	1
55	55	0	2013-01-01	vacio	vacio	1
56	56	0	2013-01-01	vacio	vacio	1
57	57	0	2013-01-01	vacio	vacio	1
58	58	0	2013-01-01	vacio	vacio	1
59	59	0	2013-01-01	vacio	vacio	1
60	60	0	2013-01-01	vacio	vacio	1
61	61	0	2013-01-01	vacio	vacio	1
62	62	0	2013-01-01	vacio	vacio	1
63	63	0	2013-01-01	vacio	vacio	1
64	64	0	2013-01-01	vacio	vacio	1
65	65	0	2013-01-01	vacio	vacio	1
66	66	0	2013-01-01	vacio	vacio	1
67	67	0	2013-01-01	vacio	vacio	1
68	68	0	2013-01-01	vacio	vacio	1
69	69	0	2013-01-01	vacio	vacio	1
70	70	0	2013-01-01	vacio	vacio	1
71	71	0	2013-01-01	vacio	vacio	1
72	72	0	2013-01-01	vacio	vacio	1
73	73	0	2013-01-01	vacio	vacio	1
74	74	0	2013-01-01	vacio	vacio	1
75	75	0	2013-01-01	vacio	vacio	1
76	76	0	2013-01-01	vacio	vacio	1
77	77	0	2013-01-01	vacio	vacio	1
78	78	0	2013-01-01	vacio	vacio	1
79	79	0	2013-01-01	vacio	vacio	1
80	80	0	2013-01-01	vacio	vacio	1
81	81	0	2013-01-01	vacio	vacio	1
82	82	0	2013-01-01	vacio	vacio	1
83	83	0	2013-01-01	vacio	vacio	1
84	84	0	2013-01-01	vacio	vacio	1
85	85	0	2013-01-01	vacio	vacio	1
86	86	0	2013-01-01	vacio	vacio	1
87	87	0	2013-01-01	vacio	vacio	1
88	88	0	2013-01-01	vacio	vacio	1
89	89	0	2013-01-01	vacio	vacio	1
90	90	0	2013-01-01	vacio	vacio	1
91	91	0	2013-01-01	vacio	vacio	1
92	92	0	2013-01-01	vacio	vacio	1
93	93	0	2013-01-01	vacio	vacio	1
94	94	0	2013-01-01	vacio	vacio	1
95	95	0	2013-01-01	vacio	vacio	1
96	96	0	2013-01-01	vacio	vacio	1
97	97	0	2013-01-01	vacio	vacio	1
98	98	0	2013-01-01	vacio	vacio	1
99	99	0	2013-01-01	vacio	vacio	1
100	100	0	2013-01-01	vacio	vacio	1
101	101	0	2013-01-01	vacio	vacio	1
102	102	0	2013-01-01	vacio	vacio	1
103	103	0	2013-01-01	vacio	vacio	1
104	104	0	2013-01-01	vacio	vacio	1
105	105	0	2013-01-01	vacio	vacio	1
106	106	0	2013-01-01	vacio	vacio	1
107	107	0	2013-01-01	vacio	vacio	1
108	108	0	2013-01-01	vacio	vacio	1
109	109	0	2013-01-01	vacio	vacio	1
110	110	0	2013-01-01	vacio	vacio	1
111	111	0	2013-01-01	vacio	vacio	1
112	112	0	2013-01-01	vacio	vacio	1
113	113	0	2013-01-01	vacio	vacio	1
114	114	0	2013-01-01	vacio	vacio	1
115	115	0	2013-01-01	vacio	vacio	1
1	1		2013-01-01	vacio	vacio	1
\.


--
-- TOC entry 2241 (class 0 OID 0)
-- Dependencies: 198
-- Name: v_produccion_proyecto_id_produccion_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_produccion_proyecto_id_produccion_proyecto_seq', 115, true);


--
-- TOC entry 2172 (class 0 OID 43971)
-- Dependencies: 199 2188
-- Data for Name: v_productor_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_productor_proyecto (id_productor, id_proyecto, nomb_apel_productor, sexo_productor, tlf_productor, email_productor, estatus_productor) FROM stdin;
\.


--
-- TOC entry 2242 (class 0 OID 0)
-- Dependencies: 200
-- Name: v_productor_proyecto_id_productor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_productor_proyecto_id_productor_seq', 1, false);


--
-- TOC entry 2174 (class 0 OID 43976)
-- Dependencies: 201 2188
-- Data for Name: v_productores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_productores (id_registro, id_proyecto, num_pro_directos, num_prod_femeninos, num_prod_masculinos, estatus_tabla) FROM stdin;
2	2	0	0	0	1
3	3	0	0	0	1
4	4	0	0	0	1
5	5	0	0	0	1
6	6	0	0	0	1
7	7	0	0	0	1
8	8	0	0	0	1
9	9	0	0	0	1
10	10	0	0	0	1
11	11	0	0	0	1
12	12	0	0	0	1
13	13	0	0	0	1
14	14	0	0	0	1
15	15	0	0	0	1
16	16	0	0	0	1
17	17	0	0	0	1
18	18	0	0	0	1
19	19	0	0	0	1
20	20	0	0	0	1
21	21	0	0	0	1
22	22	0	0	0	1
23	23	0	0	0	1
24	24	0	0	0	1
25	25	0	0	0	1
26	26	0	0	0	1
27	27	0	0	0	1
28	28	0	0	0	1
29	29	0	0	0	1
30	30	0	0	0	1
31	31	0	0	0	1
32	32	0	0	0	1
33	33	0	0	0	1
34	34	0	0	0	1
35	35	0	0	0	1
36	36	0	0	0	1
37	37	0	0	0	1
38	38	0	0	0	1
39	39	0	0	0	1
40	40	0	0	0	1
41	41	0	0	0	1
42	42	0	0	0	1
43	43	0	0	0	1
44	44	0	0	0	1
45	45	0	0	0	1
46	46	0	0	0	1
47	47	0	0	0	1
48	48	0	0	0	1
49	49	0	0	0	1
50	50	0	0	0	1
51	51	0	0	0	1
52	52	0	0	0	1
53	53	0	0	0	1
54	54	0	0	0	1
55	55	0	0	0	1
56	56	0	0	0	1
57	57	0	0	0	1
58	58	0	0	0	1
59	59	0	0	0	1
60	60	0	0	0	1
61	61	0	0	0	1
62	62	0	0	0	1
63	63	0	0	0	1
64	64	0	0	0	1
65	65	0	0	0	1
66	66	0	0	0	1
67	67	0	0	0	1
68	68	0	0	0	1
69	69	0	0	0	1
70	70	0	0	0	1
71	71	0	0	0	1
72	72	0	0	0	1
73	73	0	0	0	1
74	74	0	0	0	1
75	75	0	0	0	1
76	76	0	0	0	1
77	77	0	0	0	1
78	78	0	0	0	1
79	79	0	0	0	1
80	80	0	0	0	1
81	81	0	0	0	1
82	82	0	0	0	1
83	83	0	0	0	1
84	84	0	0	0	1
85	85	0	0	0	1
86	86	0	0	0	1
87	87	0	0	0	1
88	88	0	0	0	1
89	89	0	0	0	1
90	90	0	0	0	1
91	91	0	0	0	1
92	92	0	0	0	1
93	93	0	0	0	1
94	94	0	0	0	1
95	95	0	0	0	1
96	96	0	0	0	1
97	97	0	0	0	1
98	98	0	0	0	1
99	99	0	0	0	1
100	100	0	0	0	1
101	101	0	0	0	1
102	102	0	0	0	1
103	103	0	0	0	1
104	104	0	0	0	1
105	105	0	0	0	1
106	106	0	0	0	1
107	107	0	0	0	1
108	108	0	0	0	1
109	109	0	0	0	1
110	110	0	0	0	1
111	111	0	0	0	1
112	112	0	0	0	1
113	113	0	0	0	1
114	114	0	0	0	1
115	115	0	0	0	1
1	1	0	0	0	1
\.


--
-- TOC entry 2243 (class 0 OID 0)
-- Dependencies: 202
-- Name: v_productores_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_productores_id_registro_seq', 115, true);


--
-- TOC entry 2176 (class 0 OID 43982)
-- Dependencies: 203 2188
-- Data for Name: v_productos_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_productos_proyecto (id_producto_proyecto, id_produccion_proyecto, id_proyecto, capacidad_instalada, cantidad, tiempo_produccion, precio_venta, terreno_producto, infra_producto, estatus_tabla_producto) FROM stdin;
\.


--
-- TOC entry 2244 (class 0 OID 0)
-- Dependencies: 204
-- Name: v_productos_proyecto_id_producto_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_productos_proyecto_id_producto_proyecto_seq', 1, false);


--
-- TOC entry 2178 (class 0 OID 43990)
-- Dependencies: 205 2188
-- Data for Name: v_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_proyecto (id_proyecto, nombre_proyecto, descripcion_proyecto, comite_eco_comunal, id_fig_juridica, figura_jur_reg, fecha_registro_proyecto, estatus_tabla_proyecto, id_usuario_registra) FROM stdin;
2	EPSDC Escuela De Producción Y Fábrica De Calzado La Silsa	EPSDC Escuela De Producción Y Fábrica De Calzado La Silsa		1	SI	2013-01-31	1	1
4	Fábrica de Artículos Deportivos Indio Katia	Fábrica de Artículos Deportivos Indio Katia	NO	1	SI	2013-01-31	1	1
5	EPSD MIXTA TEXTIL CALZADO CREACIONES GUAICAIPURO	EPSD MIXTA TEXTIL CALZADO CREACIONES GUAICAIPURO		1	SI	2013-01-31	1	1
6	EPS TEXTIL COMUNAL	EPS TEXTIL COMUNAL		1	SI	2013-01-31	1	1
7	DESPULPADORA Y EMPAQUETADORA DE FRUTAS	DESPULPADORA Y EMPAQUETADORA DE FRUTAS		1	SI	2013-01-31	1	1
8	PASTELERIA DULCE REVOLUCIÓN	PASTELERIA DULCE REVOLUCIÓN		1	SI	2013-01-31	1	1
9	CONFECCIÓN TEXTIL 	CONFECCIÓN TEXTIL 		1	SI	2013-01-31	1	1
11	TALLER DE COSTURA ARTESANAL LA BICENTENARIA 2012 TEXTIL	TALLER DE COSTURA ARTESANAL LA BICENTENARIA 2012 TEXTIL		1	SI	2013-01-31	1	1
12	Guarapera Caribia	Guarapera Caribia		1	SI	2013-01-31	1	1
13	EPS Textil NEGRA MATEA	EPS Textil NEGRA MATEA		0		2013-01-31	0	1
14	Panificadora Socialista.	Panificadora Socialista.		0		2013-01-31	0	1
15	EPS  Textil.	EPS  Textil.		0		2013-01-31	0	1
16	Construcción de la bloquera y escuela de constructor popular.	Construcción de la bloquera y escuela de constructor popular.		0		2013-01-31	0	1
17	EPS Textil	EPS Textil		0		2013-01-31	0	1
18	Avícola Fabricio Ojeda                                               (Gallinas Ponedoras).	Avícola Fabricio Ojeda                                               (Gallinas Ponedoras).		0		2013-01-31	0	1
19	Panadería Socialista.	Panadería Socialista.		0		2013-01-31	0	1
20	EPS Textil. MÁS REVOLUCIÓN	EPS Textil. MÁS REVOLUCIÓN		0		2013-01-31	0	1
21	Centro de Suministro Agroalimentario Socialista Comunal.	Centro de Suministro Agroalimentario Socialista Comunal.		0		2013-01-31	0	1
22	Textil y Confecciones Sierra Maestra.	Textil y Confecciones Sierra Maestra.	SI	1	SI	2013-01-31	1	1
23	FRIGORIFICO COMUNAL JOSE PILAR ROMERO	FRIGORIFICO COMUNAL JOSE PILAR ROMERO		1	SI	2013-01-31	1	1
24	RUTA COMUNAL DE PERSONAS CON DISCAPACIDAD MOTORA	RUTA COMUNAL DE PERSONAS CON DISCAPACIDAD MOTORA		1	SI	2013-01-31	1	1
25	AMPLIACIÓN Y MEJORAS DE LA PANIFICADORA	AMPLIACIÓN Y MEJORAS DE LA PANIFICADORA		1	SI	2013-01-31	1	1
26	TALLER DE CORTE Y CONFECCION LAS ABEJITAS DEL PANAL 	TALLER DE CORTE Y CONFECCION LAS ABEJITAS DEL PANAL 		1	SI	2013-01-31	1	1
27	TALLER DE CONFECCION TEXTIL RENACIENDO EL SOCIALISMO	TALLER DE CONFECCION TEXTIL RENACIENDO EL SOCIALISMO		1	SI	2013-01-31	1	1
28	HUERTO COMUNITARIO 	HUERTO COMUNITARIO 		1		2013-01-31	1	1
29	FRIGORIFICO COMUNAL (COMPRA DE CAMION CAVA REFRIGERANTE NUEVO)	FRIGORIFICO COMUNAL (COMPRA DE CAMION CAVA REFRIGERANTE NUEVO)		1	SI	2013-01-31	1	1
30	Café y Galeria las violetas	Café y Galeria las violetas		1	SI	2013-01-31	1	1
31	Panificadora y Herreria Comunitaria	Panificadora y Herreria Comunitaria		0		2013-01-31	0	1
32	E.P.S Proyecto para la Cosntrucción de la Quesera del Pueblo 	E.P.S Proyecto para la Cosntrucción de la Quesera del Pueblo 		0		2013-01-31	0	1
33	Proyecto de rehabilitación y ampliación de la casa comunal Y TEXTILERA	Proyecto de rehabilitación y ampliación de la casa comunal Y TEXTILERA		0		2013-01-31	0	1
34	Frigorifico Comunal	Frigorifico Comunal		0		2013-01-31	0	1
35	Proyecto de herreria Comunal	Proyecto de herreria Comunal		0		2013-01-31	0	1
36	Textilera  y Bordadora 	Textilera  y Bordadora 		0		2013-01-31	0	1
37	INSUMED ÑARAULÌ (LENCERIAS HOSPITALARIA)	INSUMED ÑARAULÌ (LENCERIAS HOSPITALARIA)	No	1	SI	2013-01-31	1	1
38	Taller de Diseño y Confección Onuma	Taller de Diseño y Confección Onuma	NO	1	EN PROCESO	2013-01-31	1	1
39	Onuma(Café  Organopónico)	Onuma(Café  Organopónico)	NO	1	EN PROCESO	2013-01-31	1	1
40	EPSD de Herrería Socialista	EPSD de Herrería Socialista	no	1	NO	2013-01-31	1	1
41	Paseo Anauco  Centro de Suministro de Rubros Fresco ( Primera  Fase) (Ají,Cebollín Ajo)	Paseo Anauco  Centro de Suministro de Rubros Fresco ( Primera  Fase) (Ají,Cebollín,Ajo)	NO	5	NO	2013-01-31	5	1
42	CONFECCIONES SOBERANÍA COMUNAL 	CONFECCIONES SOBERANÍA COMUNAL 		1	SI	2013-01-31	1	1
43	TALLER TEXTIL	TALLER TEXTIL		1	SI	2013-01-31	1	1
44	PROYECTO SOCIOPREDUCTIVO PROVEEDURÍA ESTUDIANTIL PARA LA ORGANIZACIÓN Y FORMACIÓN SOCIALISTA	PROYECTO SOCIOPREDUCTIVO PROVEEDURÍA ESTUDIANTIL PARA LA ORGANIZACIÓN Y FORMACIÓN SOCIALISTA		1	SI	2013-01-31	1	1
45	RESCATANDO SABORES	RESCATANDO SABORES		1	SI	2013-01-31	1	1
46	 CONFECCION TEXTIL COMUNITARIA NEGRO PRIMERO.	 CONFECCION TEXTIL COMUNITARIA NEGRO PRIMERO.		1	SI	2013-01-31	1	1
47	  Panaderia y Abasto Comunitario  NEGRO PRIMERO .   	  Panaderia y Abasto Comunitario  NEGRO PRIMERO .   		1	SI	2013-01-31	1	1
48	  Carpinteria y Herreria Comunitaria NEGRO PRIMERO	  Carpinteria y Herreria Comunitaria NEGRO PRIMERO		1	SI	2013-01-31	1	1
49	Centro Integral Socioproductivo Socialista Comuna Amalivaca\nCISCA	Centro Integral Socioproductivo Socialista Comuna Amalivaca\nCISCA		0		2013-01-31	0	1
50	 EMPRESA SOCIO PRODUCTIVA DE FABRICACION DE CD`S DE PRODUCCIONES MUSICALES.	 EMPRESA SOCIO PRODUCTIVA DE FABRICACION DE CD`S DE PRODUCCIONES MUSICALES.		0		2013-01-31	0	1
51	Textil del Valle	Textil del Valle	NO	1	NO	2013-01-31	1	1
52	Empresa de Abono Orgánico Coche 	Empresa de Abono Orgánico Coche 	No	1	EN PROCESO	2013-01-31	1	1
53	Funeraria Municipal Socialista Estrella del Sur	Funeraria Municipal Socialista Estrella del Sur	SI	5	EN PROCESO	2013-01-31	5	1
54	Transporte Bruzual 	Transporte Bruzual 	Si	1	NO	2013-01-31	1	1
55	Avícola	Avícola	No	1	NO	2013-01-31	1	1
56	Recoleccion de Desecho Solidos  	Recoleccion de Desecho Solidos  	Si	1	NO	2013-01-31	1	1
57	CREACION DE EPS DE DISTRIBUCION DE GAS	CREACION DE EPS DE DISTRIBUCION DE GAS		1	SI	2013-01-31	1	1
58	PANADERIA COMUNAL EZEQUIEL ZAMORA EL VALLE 	PANADERIA COMUNAL EZEQUIEL ZAMORA EL VALLE 		1	SI	2013-01-31	1	1
59	ABASTO,PROVEEDURIA Y ALIMENTOS EN CONSERVA	ABASTO,PROVEEDURIA Y ALIMENTOS EN CONSERVA		1	SI	2013-01-31	1	1
3	Café Caracas Catia 	Café Caracas Catia 		1	--Seleccione--	2013-01-31	1	1
1	Manos A La Siembra	Manos A La Siembra		1	--Seleccione--	2013-01-31	1	1
60	Confecciones textil Zamora (2da fase ampliacion)	Confecciones textil Zamora (2da fase ampliacion)		1	SI	2013-01-31	1	1
61	  CORTE  Y COSTURA COMUNAL 	  CORTE  Y COSTURA COMUNAL 		1	SI	2013-01-31	1	1
62	BLOQUERA SOCIALISTA EL PROGRESO DE LA LAGUNA	BLOQUERA SOCIALISTA EL PROGRESO DE LA LAGUNA		1	SI	2013-01-31	1	1
63	BLOQUERA SOCIALISTA	BLOQUERA SOCIALISTA		1	SI	2013-01-31	1	1
64	Taller de Confeccion Textil	Taller de Confeccion Textil		0		2013-01-31	0	1
65	Panaderia comunal	Panaderia comunal		0		2013-01-31	0	1
66	Red de Servicios Comunitarios (Charcuteria) 	Red de Servicios Comunitarios (Charcuteria) 		0		2013-01-31	0	1
67	Red de Servicios Comunitarios (cauchera ) 	Red de Servicios Comunitarios (cauchera ) 		0		2013-01-31	0	1
68	Red de Servicios Comunitarios   ( taller textil)	Red de Servicios Comunitarios   ( taller textil)		0		2013-01-31	0	1
69	Distribucion de Gas	Distribucion de Gas		0		2013-01-31	0	1
70	Instalación de cultivos de flores,plantas medicinales y hortalizas	Instalación de cultivos de flores,plantas medicinales y hortalizas		0		2013-01-31	0	1
71	Alimentos en Conserva	Alimentos en Conserva	NO	1	SI	2013-01-31	1	1
72	Centro de Restauración Ecológica Itagua Venceremos (Vivero de plantas Ornamentales)	Centro de Restauración Ecológica Itagua Venceremos (Vivero de plantas Ornamentales)	Si	1	EN PROCESO	2013-01-31	1	1
73	Panadería Socialista Silvino Pérez	Panadería Socialista Silvino Pérez	no	1	NO	2013-01-31	1	1
74	Carpintería Socialista Misioneros Emprendedores de Piedra Azul	Carpintería Socialista Misioneros Emprendedores de Piedra Azul	No	1	EN PROCESO	2013-01-31	1	1
75	Empresa de Propiedad Social Textil Comuna La Veguita 	Empresa de Propiedad Social Textil Comuna La Veguita 	No	1	SI	2013-01-31	1	1
76	Empresa de Construcción Antímano	Empresa de Construcción Antímano	No	1	EN PROCESO	2013-01-31	1	1
77	Café Caracas Antímano	Café Caracas Antímano	No	1	EN PROCESO	2013-01-31	1	1
78	Agricultura Comunal Estrella Bolivariana (Gallinas Ponedoras)	Agricultura Comunal Estrella Bolivariana (Gallinas Ponedoras)	NO	1	NO	2013-01-31	1	1
79	CORTE CORTURA ESTAMPADOS Y BORDADOS SOCIALISTA	CORTE CORTURA ESTAMPADOS Y BORDADOS SOCIALISTA		1	SI	2013-01-31	1	1
80	 SOCIOPRODUCTIVO DE CORTE, COSTURA, ESTAMPADOS Y BORDADOS 2DA FASE AMPLIACION	 SOCIOPRODUCTIVO DE CORTE, COSTURA,ESTAMPADOS Y BORDADOS 2DA FASE AMPLIACION		1	SI	2013-01-31	1	1
81	SOCIOPRODUCTIVO PRODUCTOS DE LIMPIEZA 	SOCIOPRODUCTIVO PRODUCTOS DE LIMPIEZA 		1	SI	2013-01-31	1	1
82	TEXTILERA SOCIALISTA 	TEXTILERA SOCIALISTA 		1	SI	2013-01-31	1	1
83	PANADERIA Y REPOSTERIA COMUNAL 	PANADERIA Y REPOSTERIA COMUNAL 		0	SI	2013-01-31	0	1
84	PROYECTO DE ARTESANIA MUÑEQUERIA,ORFEBRERIA Y OTROS 	PROYECTO DE ARTESANIA MUÑEQUERIA,ORFEBRERIA Y OTROS		1	SI	2013-01-31	1	1
85	CONFECCION Y BORDADOS DE GORRAS Y FRANELAS 	CONFECCION Y BORDADOS DE GORRAS Y FRANELAS 		1	SI	2013-01-31	1	1
86	PANADERÍA SOCIALISTA	PANADERÍA SOCIALISTA		1	SI	2013-01-31	1	1
87	PANADERÍA RESTAURANT FUERZA Y VALORES ANDRES BELLO	PANADERÍA RESTAURANT FUERZA Y VALORES ANDRES BELLO		1	SI	2013-01-31	1	1
88	2fase de panaderia 	2fase de panaderia 		1	SI	2013-01-31	1	1
89	Gallinas ponedoras 	Gallinas ponedoras 		1	SI	2013-01-31	1	1
90	MANUFACTURA COMUNAL	MANUFACTURA COMUNAL		1	SI	2013-01-31	1	1
91	CHARCUTERIA COMUNAL 	CHARCUTERIA COMUNAL 		1	SI	2013-01-31	1	1
92	PISCICULTURA URBANA 	PISCICULTURA URBANA 		1	SI	2013-01-31	1	1
93	AGRICULTURA URBANA	AGRICULTURA URBANA		1	SI	2013-01-31	1	1
94	PIÑATERIA COMUNITARIA ANDRES BELLO	PIÑATERIA COMUNITARIA ANDRES BELLO		1	SI	2013-01-31	1	1
95	CENTRO DE FOTOCOPIADO,ENCUADERNACIÓN LIBRERÍA Y OTROS SERVICIOS AGREGADOS	CENTRO DE FOTOCOPIADO, ENCUADERNACIÓN LIBRERÍA Y OTROS SERVICIOS AGREGADOS 		1	SI	2013-01-31	1	1
96	HARAPOS NUESTROS 	HARAPOS NUESTROS 		1	SI	2013-01-31	1	1
97	CONSTRUCCION Y EQUIPAMIENTO DE CASA  SOCIOPRODUCTIVA 	CONSTRUCCION Y EQUIPAMIENTO DE CASA  SOCIOPRODUCTIVA 		1	SI	2013-01-31	1	1
98	PANADERIA SOCIALISTA 7 DE SEPTIEMBRE 	PANADERIA SOCIALISTA 7 DE SEPTIEMBRE 		1	SI	2013-01-31	1	1
99	FORTALECIMIENTO DE LA PANADERÍA LAS BARRAS	FORTALECIMIENTO DE LA PANADERÍA LAS BARRAS		1	SI	2013-01-31	1	1
100	HERRERIA SOCIAL SANTA ELENA CORAZÓN DE JESUS	HERRERIA SOCIAL SANTA ELENA CORAZÓN DE JESUS		1	SI	2013-01-31	1	1
101	HUERTO COMUNAL 	HUERTO COMUNAL 		1	SI	2013-01-31	1	1
102	panaderia el sabor del naranjal 	panaderia el sabor del naranjal 		1	SI	2013-01-31	1	1
103	Kiosko turisticos artesanal	Kiosko turisticos artesanal		1	SI	2013-01-31	1	1
104	unidad socio productiva brisas de arismenda (agricultura urbana)	unidad socio productiva brisas de arismenda (agricultura urbana)		1	SI	2013-01-31	1	1
105	panaderia comunal 	panaderia comunal 		1	SI	2013-01-31	1	1
106	textil 2da fase 	textil 2da fase 		1	SI	2013-01-31	1	1
107	Producción y distribución agroproductores	Producción y distribución agroproductores		1	SI	2013-01-31	1	1
108	Empresa socialista de construccion y mantenimientos   de obras y servicios genrales 	Empresa socialista de construccion y mantenimientos   de obras y servicios genrales 		0		2013-01-31	0	1
109	Infraestructura instalación de Textilera 	Infraestructura instalación de Textilera 		0		2013-01-31	0	1
110	elaboración de alimentos en conserva Juana Ramirez	elaboración de alimentos en conserva Juana Ramirez		0		2013-01-31	0	1
111	EPSDC  (Diseño y confección de Ropa Indio Caricuao	EPSDC  (Diseño y confección de Ropa Indio Caricuao		0		2013-01-31	0	1
112	EPSDC Textil Socialista (Diseño y confección)	EPSDC Textil Socialista (Diseño y confección)		0		2013-01-31	0	1
113	Panaderia Comunal 	Panaderia Comunal 		0		2013-01-31	0	1
114	Fabrica de Prendas de Vestir para damas,caballeros y niños 	Fabrica de Prendas de Vestir para damas,caballeros y niños 		0		2013-01-31	0	1
115	Unidad de Confecciones Textile 	Unidad de Confecciones Textile 		0		2013-01-31	0	1
10	CENTRO DE ABASTECIMIENTO SOCIALISTA ERNESTO CHE GUEVARA (CAS)	CENTRO DE ABASTECIMIENTO SOCIALISTA ERNESTO CHE GUEVARA (CAS)	Si	1	--Seleccione--	2013-01-31	1	1
\.


--
-- TOC entry 2245 (class 0 OID 0)
-- Dependencies: 206
-- Name: v_proyecto_id_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_proyecto_id_proyecto_seq', 115, true);


--
-- TOC entry 2180 (class 0 OID 43998)
-- Dependencies: 207 2188
-- Data for Name: v_responsable_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_responsable_proyecto (id_resp_proyecto, id_proyecto, fecha_asignacion, id_usuario, id_usuario_asigna, estatus_resp) FROM stdin;
\.


--
-- TOC entry 2246 (class 0 OID 0)
-- Dependencies: 208
-- Name: v_responsable_proyecto_id_resp_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_responsable_proyecto_id_resp_proyecto_seq', 1, false);


--
-- TOC entry 2182 (class 0 OID 44004)
-- Dependencies: 209 2188
-- Data for Name: v_tipo_actividad_economica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_tipo_actividad_economica (id_registro, id_proyecto, id_cadena, id_area_cadena, estatus_tabla) FROM stdin;
2	2	10	23	1
4	4	10	23	1
5	5	10	23	1
6	6	10	23	1
7	7	1	3	1
8	8	1	2	1
9	9	10	23	1
11	11	10	23	1
12	12	8	21	1
13	13	10	23	1
14	14	1	2	1
15	15	10	23	1
16	16	2	6	1
17	17	10	23	1
18	18	8	16	1
19	19	1	2	1
20	20	10	23	1
21	21	1	1	1
22	22	10	23	1
23	23	1	1	1
24	24	7	11	1
25	25	1	2	1
26	26	10	23	1
27	27	10	23	1
28	28	8	17	1
29	29	1	1	1
30	30	1	2	1
31	31	0	0	1
32	32	1	1	1
33	33	10	23	1
34	34	1	1	1
35	35	2	4	1
36	36	10	23	1
37	37	10	23	1
38	38	10	23	1
39	39	8	22	1
40	40	2	4	1
41	41	1	1	1
42	42	10	23	1
43	43	10	23	1
44	44	7	1	1
45	45	1	2	1
46	46	10	23	1
47	47	1	2	1
48	48	2	7	1
49	49	1	9	1
50	50	7	8	1
51	51	10	23	1
52	52	8	15	1
53	53	7	12	1
54	54	7	11	1
55	55	8	16	1
56	56	7	13	1
57	57	7	1	1
58	58	1	2	1
59	59	1	1	1
60	60	10	23	1
61	61	10	23	1
62	62	2	6	1
63	63	2	6	1
64	64	10	23	1
65	65	1	2	1
66	66	1	1	1
67	67	7	14	1
68	68	10	23	1
69	69	7	1	1
70	70	8	17	1
71	71	1	2	1
72	72	8	18	1
73	73	1	2	1
74	74	2	7	1
75	75	10	23	1
76	76	2	5	1
77	77	1	2	1
78	78	8	16	1
79	79	10	23	1
80	80	10	23	1
81	81	11	24	1
82	82	10	23	1
83	83	1	2	1
84	84	9	0	1
85	85	10	23	1
86	86	1	2	1
87	87	1	2	1
88	88	1	2	1
89	89	8	16	1
90	90	10	23	1
91	91	1	1	1
92	92	8	19	1
93	93	8	17	1
94	94	7	8	1
95	95	7	1	1
96	96	10	23	1
97	97	10	23	1
98	98	1	2	1
99	99	1	2	1
100	100	2	4	1
101	101	8	17	1
102	102	1	2	1
103	103	7	10	1
104	104	8	17	1
105	105	1	2	1
106	106	10	23	1
107	107	8	17	1
108	108	7	5	1
109	109	10	23	1
110	110	1	2	1
111	111	10	23	1
112	112	10	23	1
113	113	1	2	1
114	114	10	2	1
115	115	10	2	1
117	10	2	5	1
120	3	1	2	1
126	1	8	21	1
\.


--
-- TOC entry 2247 (class 0 OID 0)
-- Dependencies: 210
-- Name: v_tipo_actividad_economica_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_tipo_actividad_economica_id_registro_seq', 126, true);


--
-- TOC entry 2184 (class 0 OID 44010)
-- Dependencies: 211 2188
-- Data for Name: v_ubicacion_proyecto_georeferencial; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_ubicacion_proyecto_georeferencial (id_registro, id_proyecto, estado, municipio, parroquia, id_circuito, id_eje_parroquial, latitud, longitud, direccion, estatus_tabla) FROM stdin;
2	2	6	104	353	1	7			Av. Bolívar. Final De La Calle Argentina. Antigua Lechería La Silsa. Parroquia Sucre.	1
4	4	6	104	353	1	9			Mercado Municipal De Catia. Piso 3. Estación Del Metro Perez Bonalde	1
5	5	6	104	353	1	0			CALLE PRINCIPAL SECTOR VISTA EL MAR ZONA POSTAL 1030	1
6	6	6	104	353	1	0			CALLE 6 ESCALERA EL ESFUERZO CASA PISO 1 NUMERO 57-09 BARRIO NUEVO HORIZONTE CATIA	1
7	7	6	104	353	1	0			CALLE 5 BARRIO NUEVO HORIZONTE ZONA POSTAL 1030	1
8	8	6	104	353	1	0			CALLE BRASIL ENTRE 5TA Y 6TA AV. URB. NUEVA CARACAS CATIA.	1
9	9	6	104	353	1	0			LOS FRAILES DE CATIA	1
11	11	6	104	353	1	0			COMUNIDAD JO´SE ANTONIO PÁEZ KM 11 PARROQUIA EL JUNQUITO.	1
12	12	6	104	353	1	0			CALLE PRINCIPAL SECTOR CIUDAD CARIBIA	1
13	13	6	104	343	1	0			Hospital Psiquiátrico de Caracas Manicomio La Pastora.	1
14	14	6	104	353	1	0			Preescolar Bolivia Tovar Urb Raúl Leoni Casalta III entre los bloques 10,11,12	1
15	15	6	104	353	1	0			Calle Carabobo Casco Central El Limón Autopista Caracas La Guaira. Consejo Comunal Luis Mariano Rivera.	1
16	16	6	104	353	1	0			Final AV. Bolívar entre Av. Atlántico y Calle Colombia Antigua Lechería La Silsa planta baja.	1
17	17	6	104	353	1	0			Calle El Molino Nº 25 Ruperto Lugo Catia Parroquia Sucre.	1
18	18	6	104	353	1	0			Sector Gramoven eje III Núcleo de Desarrollo Endógeno Fabricio Ojeda NUDEFO).	1
19	19	6	104	353	1	0			Calle Panorama Guaicaipuro II Los Magallanes de Catia Parroquia Sucre Municipio Libertador.	1
20	20	6	104	353	1	0			Sector Tamanaco Ámbito F-16 del Barrio Isaías Medina Angarita Catia Parroquia Sucre del Municipio Bolivariano Libertador.	1
21	21	6	104	353	1	0			Urb. Raúl Leoni Casalta III Sucre Parroquia Sucre.	1
22	22	6	104	332	2	11			Calle el porvenir de Sierra maestra casa comunal Maritza Viloria.  Ref: Arbol de los peluches	1
23	23	6	104	349	2	0			CALLE LA ACEQUIA URB LOS EUCALIPTOS ZONA POSTAL 1020	1
24	24	6	104	332	2	0			BARRIO ANDRES ELOY BLANCO CALLE LAS DELICIAS #27 PARROQUIA 23 DE ENERO	1
25	25	6	104	349	2	0			3RA. VUELTA DEL ATLANTICO	1
26	26	6	104	332	2	0			CALLE REAL DE LA CAÑADA SECTOR LA CAÑADA PARROQUIA 23 DE ENERO ZONA POSTAL 1030	1
27	27	6	104	349	2	0			CALLE REAL SECTOR EL GUARATARO ZONA POSTAL 1011	1
28	28	6	104	332	2	0				1
29	29	6	104	349	2	0			AV SAN MARTIN CON CALLE EL CARMEN SECTOR EL GUARATARO	1
30	30	6	104	337	2	0				1
31	31	6	104	349	2	0			Calle pintosalina  Sector pintosalinas puerta negra trercera vuelta del atlantico	1
32	32	6	104	349	2	0			Diagonal a la Estación del Metro Capuchino	1
33	33	6	104	349	2	0			El Guarataro Diagonal Metro Capuchino Casa Comunal Jose Pílar Romero 	1
34	34	6	104	349	2	0			El Guarataro Diagonal Metro Capuchino Casa Comunal Jose Pílar Romero 	1
35	35	6	104	332	2	0			Calle 24 de Julio Sector Andres Eloy Blanco al CEMAPP	1
36	36	6	104	332	2	0			Parroquia 23 de Enero sector central Cerca de la Escuela Tecnica Robinsoniana Manuel Palacio Fajardo 	1
37	37	6	104	348	3	13			EDIF. AYACUCHO PLANTA BAJA  LOCAL N° 4  ESQUINA SAN JOSE A SAN LUIS  AVENIDA FUERZAS ARMADAS  PARRROQUIA SAN JOSE 	1
38	38	6	104	341	3	14			EDIF. LOS ANDES SALIDA HACIA EL BULEVAR DE SABANA GRANDE DEL METRO DE PLAZA VENEZUELA  DIAGONAL A CONFERRY.	1
39	39	6	104	341	3	14			EDIF. LOS ANDES SALIDA HACIA EL BULEVAR DE SABANA GRANDE DEL METRO DE PLAZA VENEZUELA  DIAGONAL A CONFERRY.	1
40	40	6	104	346	3	27			Av Leonardo Ruiz Pineda  calle Vuelta el Casquillo  sector Mamon Helicoide  local 8.	1
41	41	6	104	347	3	17			Paseo de Conexión entre Av. Panteon y Mexico 	1
42	42	6	104	350	3	0			AV. VICTORIA PROLONGACION CALLE EL PROGRESO CASA 13 URB TERRAZAS DE LAS ACACIAS 	1
43	43	6	104	335	3	1			CALLE PPAL OBRA GUAICAIPURO CON 1ERA CASA 06 URB EL CARMEN	1
44	44	6	104	350	3	2			AV. INTERCOMUNAL EL VALLE-COCHE CALLE 14 EDIF RESIDENCIAS GUAIQUERI PISO 2 APT 204 URB LOS JARDINES DELVALLE 	1
45	45	6	104	350	3	3			SAN PEDRO LOS LAURELES	1
46	46	6	104	341	3	4			CALLE EL CORTIJO DE SARRIA EDIF ALTAGRACIA PISO 03 LOCAL 9 SECTOR SARRIA	1
47	47	6	104	341	3	0			CALLE EL CORTIJO DE SARRIA EDIF ALTAGRACIA PISO 03 LOCAL 9 SECTOR SARRIA	1
48	48	6	104	341	3	0			CALLE EL CORTIJO DE SARRIA EDIF ALTAGRACIA PISO 03 LOCAL 9 SECTOR SARRIA	1
49	49	6	104	341	3	0				1
50	50	6	104	341	3	0				1
51	51	6	104	342	4	0			CIRCUITO 4  EL VALLE  EJE 5  CALLE 18 SECTOR SOROCAIMA.	1
52	52	6	104	338	4	18			Calle Principal de Turmerito  Sector Turmerito	1
53	53	6	104	351	4	28			Final del Boulevard Cesar Rengifo. Cementerio Gerenal del Sur. 	1
55	55	6	104	338	4	18			Sin definir	1
56	56	6	104	342	4	19			CIRCUITO 4  EL VALLE  EJE 1  AVENIDA INTERCOMUNAL DE EL VALLE  BARRIO BRUZUAL SECTOR LA COOPERATIVA	1
57	57	6	104	338	4	0			CALLE PRINCIPAL SECTOR LA MAYAS	1
58	58	6	104	342	4	0			SECTOR ZAMORA PARTE ALTA 	1
59	59	6	104	342	4	0			EL VALLE LAS MARIAS EL 70	1
60	60	6	104	342	4	0			CALLE MATAPALO CASA Nº45 SECTOR ZAMORA EL CALVARIO EL VALLE	1
61	61	6	104	338	4	0			CALLE EL MANGUITO C/C EL ESTANQUE SECTOR EL COCHECITO	1
62	62	6	104	338	4	0			CARRETERA PANAMERICANA VIA LOS TEQUES KILOMETRO 2 CASA Nº 30-2 ESCALERA 5 SECTOR LA LAGUNA	1
63	63	6	104	338	4	0			CALLE ZEA SECTOR EL ESTANQUE	1
54	54	6	104	342	4	19			CIRCUITO 4  EL VALLE  EJE 1  AVENIDA INTERCOMUNAL DE EL VALLE  BARRIO BRUZUAL SECTOR LA COOPERATIVA	1
64	64	6	104	342	4	0			Calle Zamora con Calle Matapalo paralela a la Av Intercomunal	1
65	65	6	104	342	4	0			Calle San Andres  Sector Los Cedros 	1
66	66	6	104	351	4	0			Poligonal: Esquina Alcabala Casa Nº 23	1
3	3	6	104	353	1	7			Bulevar De Catia	1
67	67	6	104	351	4	0			Poligonal: Esquina Alcabala Casa Nº 24	1
68	68	6	104	351	4	0			Poligonal: Esquina Alcabala Casa Nº 25	1
69	69	6	104	351	4	0			Calle 1 de Mayo El Cementerio	1
70	70	6	104	351	4	0			Dentro del Cementerio general del Sur	1
71	71	6	104	334	5	20			Sector El Depano  Barrio Germán Rodríguez/ Ref 3 esquinas	1
72	72	6	104	336	5	21			Av. Principal urbanización Rafael García Carballo.  Entrada hacia la calle Mauro Páez Pumar  al lado de la EBD Maro Páez Pumar.  Barrio El Onoto Caricuao	1
73	73	6	104	336	5	22			Sector La Ceiba parte baja  barrio el Onoto  Caricuao. El Plan del Barrio el Onoto	1
74	74	6	104	340	5	24			Calle Piedra Azul urbanización Bella Vista  parroquia El Paraíso.  Final Calle Piedra Azul	1
75	75	6	104	345	5	16			Km 10 Carretera Vieja Caracas-Los Teques. Sector La Veguita. Primera entrada a mano izquierda después de la Mini-Bruno	1
76	76	6	104	334	5	30			Casa Integral Comuna Luisa Cáceres de Arismendi  carapita parroquia Antímano	1
77	77	6	104	334	5	25			Sector Antímano Calle del Medio. Punto de referncia:  Plaza Bolívar	1
78	78	6	104	344	5	26			Sector Estrella Bolivariana  parte alta La Vega.	1
79	79	6	104	334	5	0			AV REAL DE CARAPITA 1ERO DE MAYO EL ESFUERZO SECTOR SAN JOSE 	1
80	80	6	104	334	5	0			CALLE EL COLEGIO Y REPUBLICA SECTOR DEL 70	1
81	81	6	104	334	5	0			CALLE EL COLEGIO Y REPUBLICA SECTOR DEL 70	1
82	82	6	104	334	5	0			CALLE PRINCIPAL BARRIO LA CUMBRE URB EL POSTILLO 	1
83	83	6	104	344	5	0			AV PRINCIPAL LAS TORRES SECTOR LOS JARDINES CASA 12	1
84	84	6	104	344	5	0			AV PRINCIPAL SECTOR CALLEJON 19 DE ABRIL 	1
85	85	6	104	344	5	0			CALLE FINAL LOS CANGILONES CASA Nº 8 URBANIZACION LA VEGA	1
86	86	6	104	334	5	0			AV. EL ESFUERZO SECTOR SAN JOSE  CARAPITA ANTIMANO	1
87	87	6	104	334	5	0			CALLE PRINCIPAL SECTOR LA ACEQUIA	1
88	88	6	104	336	5	0			AV PRINCIPAL LA HACIENDA UD5 CARICUAO	1
89	89	6	104	344	5	0			CASA COMUNITARIA LOS CANJILONES PARROQUIA LA VEGA 	1
90	90	6	104	336	5	0			AV PRINCIPAL LA HAVIENDA UD5 CARICUAO	1
91	91	6	104	336	5	0			CALLE LA HERMANDAD SECTOR COLINAS DE PALO GRANDE	1
92	92	6	104	345	5	0			CALLE PPAL DEL CASCO HISTORICO SUBIDA LA CRUZ SECTOR MACARAO	1
93	93	6	104	345	5	0			CALLE PPAL DEL CASCO HISTORICO SUBIDA LA CRUZ SECTOR MACARAO	1
94	94	6	104	334	5	0			CALLE PRINCIPAL SECTOR JESUS GONZALEZ CABRERA	1
95	95	6	104	344	5	0			CALLE LOS CANGILONES CASA Nº 17-03 SECTOR LOS PARAPAROS  LA VEGA	1
96	96	6	104	336	5	0			LA HACIENDA UD-5 AV PRINCIPAL DE CARICUAO	1
97	97	6	104	336	5	0			BLOQUE 6 UD 3 CARICUAO 	1
98	98	6	104	336	5	0			RUIZ PINEDA  UD 7 FRENTE A LA ESTACION DE METRO	1
99	99	6	104	334	5	0			SECTOR LAS BARRAS  CALLE PRINCIPAL	1
100	100	6	104	334	5	0			AV PRINCIPALÑDEL SECTOR  SANTA ELENA CORAZÓN DE JESUS	1
106	106	6	104	334	5	0			CALLE PPAL SECTOR LA CUMBRE NUEVA ESPARTA	1
101	101	6	104	344	5	0			SECTOR LOS MANGOS 	1
102	102	6	104	334	5	0			CTRA NACIONAL HACIENDA EL LIMONCITO ZONA AGRICOLA MAMERA	1
103	103	6	104	334	5	0			CTRA NACIONAL HACIENDA EL LIMONCITO ZONA AGRICOLA MAMERA	1
104	104	6	104	334	5	0			CTRA VIEJA LOS TEQUES BARRIO MAMERA	1
105	105	6	104	334	5	0			CALLE REPUBLICA SECTOR SANTA ANA	1
107	107	6	104	334	5	0			CTRA NACIONAL HACIENDA EL LIMONCITO ZONA AGRICOLA MAMERA	1
108	108	6	104	344	5	0			Parte Alta Bloques Los Mangos 	1
109	109	6	104	334	5	0			Av. Principal del 70 Parte Alta de Santa Ana 	1
110	110	6	104	334	5	0			El Depano Barrio german Rodrigues  sector la acequia 	1
111	111	6	104	336	5	0			caricuao ud 2frente al bloque tres	1
112	112	6	104	336	5	0			colinas de palo grande sector pedro camejo	1
113	113	6	104	336	5	0			av. Principal ud 5 al lado de la plaza garden a frente de la U.E  Hernandez parra	1
114	114	6	104	345	5	0			Sector la Sosa  Hacienda los Baez  con principal  subiendo Calle El Manantial Casa nª 54	1
115	115	6	104	340	5	0			Av Moran. Sector quebradita II  Bloque Los turpiales  bloques 10 y 11	1
1	1	6	104	353	1	5			Barrio Niño Jesús Sector La Hacienda Vía El Amparo.  Catia.  Brisas De Propatria	1
10	10	6	104	353	1	0			Sede De Transporte De La Policia Nacional Al Lado Del Antiguo Reten Del Junquito Barrio El Amparo	1
\.


--
-- TOC entry 2248 (class 0 OID 0)
-- Dependencies: 212
-- Name: v_ubicacion_proyecto_georeferencial_id_registro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_ubicacion_proyecto_georeferencial_id_registro_seq', 115, true);


--
-- TOC entry 2186 (class 0 OID 44016)
-- Dependencies: 213 2188
-- Data for Name: v_usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY v_usuarios (id_usuario, cedula, nombre_usuario, telefono_1, telefono_2, correo_electronico, login, password, fecha_registro, id_usuario_registra, ip_maquina_registra, status_usuario, status_clave) FROM stdin;
1	123456789	Super Usuario	02121234567	04121234567	root@root.com	admin	202cb962ac59075b964b07152d234b70	2012-03-21 00:00:00	1	172.16.0.183	1	1
3	12345678	JENISSE CARRIZALES			jjcarri2011@gmail.com	carrizales	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 13:49:53	1	127.0.0.1	1	0
4	12345677	NORMA VIDAL			amanecer61.re@gmail.com	vidal	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:21:29	1	127.0.0.1	1	0
5	12345676	JOSE RIOS			leachunte@gmail.com	rios	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:22:43	1	127.0.0.1	1	0
6	12345675	CRISTINA SOTO			cristisoto.cs@gmail.com	soto	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:23:42	1	127.0.0.1	1	0
7	12345674	OSWALDO MENDOZA			oswaldormendoza@yahoo.com	mendoza	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:24:46	1	127.0.0.1	1	0
8	12345673	CARLA RODRIGUEZ			carlarodriguezco@gmail.com	rodriguez	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:26:01	1	127.0.0.1	1	0
9	12345672	SALVADOR PRIN			prinsalvador@hotmail.com	prin	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:27:35	1	127.0.0.1	1	0
10	12345671	RAIZA CARVAJAL			rcarvajal.iue@gmail.com	carvajal	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:28:31	1	127.0.0.1	1	0
11	12345670	ANGELA PENA			unangelrosa.p@gmail.com	angela	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:30:19	1	127.0.0.1	1	0
12	12345669	YARITZA DIAZ			yaritzatiss@hotmail.com	diaz	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:31:26	1	127.0.0.1	1	0
13	12345668	MARTHA OLARTE			marthysu@gmail.com	olarte	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:32:09	1	127.0.0.1	1	0
14	12345667	ZORAIDA CAMACHO			zoraidaguaribe@gmail.com	camacho	81dc9bdb52d04dc20036dbd8313ed055	2013-04-29 14:33:03	1	127.0.0.1	1	0
15	12345666	DAYMAR COLMENAREZ			daymarperez@gmail.com	colmenarez	81dc9bdb52d04dc20036dbd8313ed055	2013-04-30 09:37:43	1	192.168.1.20	1	0
\.


--
-- TOC entry 2249 (class 0 OID 0)
-- Dependencies: 214
-- Name: v_usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('v_usuarios_id_usuario_seq', 15, true);


--
-- TOC entry 2063 (class 2606 OID 44058)
-- Dependencies: 161 161 2189
-- Name: e_area_cadena_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_area_cadena
    ADD CONSTRAINT e_area_cadena_pkey PRIMARY KEY (id_area);


--
-- TOC entry 2065 (class 2606 OID 44060)
-- Dependencies: 163 163 2189
-- Name: e_cadena_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_cadena
    ADD CONSTRAINT e_cadena_pkey PRIMARY KEY (id_cadena);


--
-- TOC entry 2067 (class 2606 OID 44062)
-- Dependencies: 165 165 2189
-- Name: e_circuito_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_circuito
    ADD CONSTRAINT e_circuito_pkey PRIMARY KEY (id_circuito);


--
-- TOC entry 2069 (class 2606 OID 44064)
-- Dependencies: 167 167 2189
-- Name: e_eje_parroquial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_eje_parroquial
    ADD CONSTRAINT e_eje_parroquial_pkey PRIMARY KEY (id_eje);


--
-- TOC entry 2071 (class 2606 OID 44066)
-- Dependencies: 169 169 2189
-- Name: e_ente_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_ente_financiamiento
    ADD CONSTRAINT e_ente_financiamiento_pkey PRIMARY KEY (id_ente);


--
-- TOC entry 2076 (class 2606 OID 44068)
-- Dependencies: 172 172 2189
-- Name: e_estatus_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_estatus_financiamiento
    ADD CONSTRAINT e_estatus_financiamiento_pkey PRIMARY KEY (id_estatus_financiamiento);


--
-- TOC entry 2078 (class 2606 OID 44070)
-- Dependencies: 174 174 2189
-- Name: e_figura_juridica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_figura_juridica
    ADD CONSTRAINT e_figura_juridica_pkey PRIMARY KEY (id_figura);


--
-- TOC entry 2083 (class 2606 OID 44072)
-- Dependencies: 177 177 2189
-- Name: e_organizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_organizacion
    ADD CONSTRAINT e_organizacion_pkey PRIMARY KEY (id_org);


--
-- TOC entry 2086 (class 2606 OID 44074)
-- Dependencies: 178 178 2189
-- Name: e_parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_parroquia
    ADD CONSTRAINT e_parroquia_pkey PRIMARY KEY (id);


--
-- TOC entry 2088 (class 2606 OID 44076)
-- Dependencies: 179 179 2189
-- Name: e_tipo_organizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_tipo_organizacion
    ADD CONSTRAINT e_tipo_organizacion_pkey PRIMARY KEY (id_tipo_org);


--
-- TOC entry 2090 (class 2606 OID 44078)
-- Dependencies: 181 181 2189
-- Name: e_unidades_Tiempo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "e_unidades_Tiempo"
    ADD CONSTRAINT "e_unidades_Tiempo_pkey" PRIMARY KEY ("idUnidadTiempo");


--
-- TOC entry 2074 (class 2606 OID 44080)
-- Dependencies: 171 171 2189
-- Name: pk_id_geo_estado; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_estado
    ADD CONSTRAINT pk_id_geo_estado PRIMARY KEY (id);


--
-- TOC entry 2081 (class 2606 OID 44082)
-- Dependencies: 176 176 2189
-- Name: pk_id_geo_municipio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY e_municipio
    ADD CONSTRAINT pk_id_geo_municipio PRIMARY KEY (id);


--
-- TOC entry 2092 (class 2606 OID 44084)
-- Dependencies: 186 186 2189
-- Name: v_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_financiamiento
    ADD CONSTRAINT v_financiamiento_pkey PRIMARY KEY (id_financiamiento);


--
-- TOC entry 2094 (class 2606 OID 44086)
-- Dependencies: 188 188 2189
-- Name: v_fotos_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_fotos_proyecto
    ADD CONSTRAINT v_fotos_proyecto_pkey PRIMARY KEY (id_registro);


--
-- TOC entry 2096 (class 2606 OID 44088)
-- Dependencies: 190 190 2189
-- Name: v_historico_ingreso_exitoso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_historico_ingreso_exitoso
    ADD CONSTRAINT v_historico_ingreso_exitoso_pkey PRIMARY KEY (id);


--
-- TOC entry 2098 (class 2606 OID 44090)
-- Dependencies: 192 192 2189
-- Name: v_historico_ingreso_fallido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_historico_ingreso_fallido
    ADD CONSTRAINT v_historico_ingreso_fallido_pkey PRIMARY KEY (id);


--
-- TOC entry 2100 (class 2606 OID 44092)
-- Dependencies: 194 194 2189
-- Name: v_org_comunitarias_sociales_vinculadas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_org_comunitarias_sociales_vinculadas
    ADD CONSTRAINT v_org_comunitarias_sociales_vinculadas_pkey PRIMARY KEY (id_registro);


--
-- TOC entry 2102 (class 2606 OID 44094)
-- Dependencies: 197 197 2189
-- Name: v_produccion_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_produccion_proyecto
    ADD CONSTRAINT v_produccion_proyecto_pkey PRIMARY KEY (id_produccion_proyecto);


--
-- TOC entry 2104 (class 2606 OID 44096)
-- Dependencies: 199 199 2189
-- Name: v_productor_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_productor_proyecto
    ADD CONSTRAINT v_productor_proyecto_pkey PRIMARY KEY (id_productor);


--
-- TOC entry 2106 (class 2606 OID 44098)
-- Dependencies: 201 201 2189
-- Name: v_productores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_productores
    ADD CONSTRAINT v_productores_pkey PRIMARY KEY (id_registro);


--
-- TOC entry 2108 (class 2606 OID 44100)
-- Dependencies: 203 203 2189
-- Name: v_productos_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_productos_proyecto
    ADD CONSTRAINT v_productos_proyecto_pkey PRIMARY KEY (id_producto_proyecto);


--
-- TOC entry 2110 (class 2606 OID 44102)
-- Dependencies: 205 205 2189
-- Name: v_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_proyecto
    ADD CONSTRAINT v_proyecto_pkey PRIMARY KEY (id_proyecto);


--
-- TOC entry 2112 (class 2606 OID 44104)
-- Dependencies: 207 207 2189
-- Name: v_responsable_proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_responsable_proyecto
    ADD CONSTRAINT v_responsable_proyecto_pkey PRIMARY KEY (id_resp_proyecto);


--
-- TOC entry 2114 (class 2606 OID 44106)
-- Dependencies: 209 209 2189
-- Name: v_tipo_actividad_economica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_tipo_actividad_economica
    ADD CONSTRAINT v_tipo_actividad_economica_pkey PRIMARY KEY (id_registro);


--
-- TOC entry 2116 (class 2606 OID 44108)
-- Dependencies: 211 211 2189
-- Name: v_ubicacion_proyecto_georeferencial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_ubicacion_proyecto_georeferencial
    ADD CONSTRAINT v_ubicacion_proyecto_georeferencial_pkey PRIMARY KEY (id_registro);


--
-- TOC entry 2118 (class 2606 OID 44110)
-- Dependencies: 213 213 213 2189
-- Name: v_usuarios_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_usuarios
    ADD CONSTRAINT v_usuarios_cedula_key UNIQUE (cedula, login);


--
-- TOC entry 2120 (class 2606 OID 44112)
-- Dependencies: 213 213 2189
-- Name: v_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY v_usuarios
    ADD CONSTRAINT v_usuarios_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2072 (class 1259 OID 44113)
-- Dependencies: 171 2189
-- Name: dir_edo; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX dir_edo ON e_estado USING btree (texto);


--
-- TOC entry 2079 (class 1259 OID 44114)
-- Dependencies: 176 2189
-- Name: dir_mun; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX dir_mun ON e_municipio USING btree (texto);


--
-- TOC entry 2084 (class 1259 OID 44115)
-- Dependencies: 178 2189
-- Name: dir_par; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX dir_par ON e_parroquia USING btree (texto);


--
-- TOC entry 2121 (class 2606 OID 44116)
-- Dependencies: 161 163 2064 2189
-- Name: e_area_cadena_id_cadena_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_area_cadena
    ADD CONSTRAINT e_area_cadena_id_cadena_fkey FOREIGN KEY (id_cadena) REFERENCES e_cadena(id_cadena);


--
-- TOC entry 2123 (class 2606 OID 44121)
-- Dependencies: 176 178 2080 2189
-- Name: e_parroquia_id_geo_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_parroquia
    ADD CONSTRAINT e_parroquia_id_geo_municipio_fkey FOREIGN KEY (id_geo_municipio) REFERENCES e_municipio(id);


--
-- TOC entry 2122 (class 2606 OID 44126)
-- Dependencies: 176 2073 171 2189
-- Name: fk_id_geo_estado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY e_municipio
    ADD CONSTRAINT fk_id_geo_estado FOREIGN KEY (id_geo_estado) REFERENCES e_estado(id);


--
-- TOC entry 2124 (class 2606 OID 44131)
-- Dependencies: 2109 205 186 2189
-- Name: v_financiamiento_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_financiamiento
    ADD CONSTRAINT v_financiamiento_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2125 (class 2606 OID 44136)
-- Dependencies: 205 2109 188 2189
-- Name: v_fotos_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_fotos_proyecto
    ADD CONSTRAINT v_fotos_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2126 (class 2606 OID 44141)
-- Dependencies: 205 2109 194 2189
-- Name: v_org_comunitarias_sociales_vinculadas_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_org_comunitarias_sociales_vinculadas
    ADD CONSTRAINT v_org_comunitarias_sociales_vinculadas_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2127 (class 2606 OID 44146)
-- Dependencies: 2109 197 205 2189
-- Name: v_produccion_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_produccion_proyecto
    ADD CONSTRAINT v_produccion_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2128 (class 2606 OID 44151)
-- Dependencies: 199 205 2109 2189
-- Name: v_productor_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productor_proyecto
    ADD CONSTRAINT v_productor_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2129 (class 2606 OID 44156)
-- Dependencies: 2109 201 205 2189
-- Name: v_productores_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productores
    ADD CONSTRAINT v_productores_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2130 (class 2606 OID 44161)
-- Dependencies: 203 197 2101 2189
-- Name: v_productos_proyecto_id_produccion_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_productos_proyecto
    ADD CONSTRAINT v_productos_proyecto_id_produccion_proyecto_fkey FOREIGN KEY (id_produccion_proyecto) REFERENCES v_produccion_proyecto(id_produccion_proyecto);


--
-- TOC entry 2131 (class 2606 OID 44166)
-- Dependencies: 207 2109 205 2189
-- Name: v_responsable_proyecto_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_responsable_proyecto
    ADD CONSTRAINT v_responsable_proyecto_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2132 (class 2606 OID 44171)
-- Dependencies: 205 209 2109 2189
-- Name: v_tipo_actividad_economica_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_tipo_actividad_economica
    ADD CONSTRAINT v_tipo_actividad_economica_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2133 (class 2606 OID 44176)
-- Dependencies: 205 2109 211 2189
-- Name: v_ubicacion_proyecto_georeferencial_id_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY v_ubicacion_proyecto_georeferencial
    ADD CONSTRAINT v_ubicacion_proyecto_georeferencial_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES v_proyecto(id_proyecto);


--
-- TOC entry 2194 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2013-05-02 09:15:59 VET

--
-- PostgreSQL database dump complete
--


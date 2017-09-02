--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.4
-- Dumped by pg_dump version 9.6.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE IF EXISTS "schema";
--
-- Name: schema; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE "schema" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';


\connect "schema"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: SCHEMA "public"; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA "public" IS 'standard public schema';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS "plpgsql" WITH SCHEMA "pg_catalog";


--
-- Name: EXTENSION "plpgsql"; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION "plpgsql" IS 'PL/pgSQL procedural language';


SET search_path = "public", pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: thing; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "thing" (
    "identifier" "text" NOT NULL,
    "name" "text",
    "image" "jsonb",
    "description" "text",
    "url" "text",
    "sameas" "text",
    "alternatename" "text",
    "disambiguatingdescription" "text",
    "mainentityofpage" "jsonb"
);


--
-- Name: intangible; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "intangible" (
)
INHERITS ("thing");


--
-- Name: structuredvalue; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "structuredvalue" (
)
INHERITS ("intangible");


--
-- Name: contactpoint; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "contactpoint" (
    "contacttype" "text"
)
INHERITS ("structuredvalue");


--
-- Name: creativework; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "creativework" (
    "author" "jsonb"
)
INHERITS ("thing");


--
-- Name: mediaobject; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "mediaobject" (
    "width" integer,
    "height" integer,
    "uploaddate" "date"
)
INHERITS ("creativework");


--
-- Name: imageobject; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "imageobject" (
    "caption" "text",
    "thumbnail" "jsonb"
)
INHERITS ("mediaobject");


--
-- Name: organization; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "organization" (
    "address" "jsonb",
    "logo" "jsonb",
    "email" "text",
    "telephone" "text",
    "faxnumber" "text"
)
INHERITS ("thing");


--
-- Name: person; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "person" (
    "givenname" "text",
    "additionalname" "text",
    "familyname" "text",
    "address" "jsonb",
    "worksfor" "jsonb",
    "email" "text",
    "jobtitle" "text"
)
INHERITS ("thing");


--
-- Name: postaladdress; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "postaladdress" (
    "addresscountry" "text",
    "addresslocality" "text",
    "addressregion" "text",
    "postofficeboxnumber" integer,
    "streetaddress" "text",
    "postalcode" integer
)
INHERITS ("contactpoint");


--
-- Name: thing thing_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "thing"
    ADD CONSTRAINT "thing_pkey" PRIMARY KEY ("identifier");


--
-- Name: public; Type: ACL; Schema: -; Owner: -
--

GRANT ALL ON SCHEMA "public" TO PUBLIC;


--
-- PostgreSQL database dump complete
--


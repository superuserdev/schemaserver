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
-- Name: thing; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE thing (
    identifier text NOT NULL,
    url text[],
    name text,
    image jsonb,
    description text
);


ALTER TABLE thing OWNER TO shgysk8zer0;

--
-- Name: intangible; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE intangible (
)
INHERITS (thing);


ALTER TABLE intangible OWNER TO shgysk8zer0;

--
-- Name: structuredvalue; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE structuredvalue (
)
INHERITS (intangible);


ALTER TABLE structuredvalue OWNER TO shgysk8zer0;

--
-- Name: contactpoint; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE contactpoint (
    contacttype text
)
INHERITS (structuredvalue);


ALTER TABLE contactpoint OWNER TO shgysk8zer0;

--
-- Name: creativework; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE creativework (
    author jsonb
)
INHERITS (thing);


ALTER TABLE creativework OWNER TO shgysk8zer0;

--
-- Name: mediaobject; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE mediaobject (
    width integer,
    height integer,
    uploaddate date
)
INHERITS (creativework);


ALTER TABLE mediaobject OWNER TO shgysk8zer0;

--
-- Name: imageobject; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE imageobject (
    caption text,
    thumbnail jsonb
)
INHERITS (mediaobject);


ALTER TABLE imageobject OWNER TO shgysk8zer0;

--
-- Name: person; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE person (
    givenname text,
    additionalname text,
    familyname text
)
INHERITS (thing);


ALTER TABLE person OWNER TO shgysk8zer0;

--
-- Name: postaladdress; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE postaladdress (
    addresscountry text,
    addresslocality text,
    addressregion text,
    postofficeboxnumber integer,
    streetaddress text
)
INHERITS (contactpoint);


ALTER TABLE postaladdress OWNER TO shgysk8zer0;

--
-- Name: thing thing_pkey; Type: CONSTRAINT; Schema: public; Owner: shgysk8zer0
--

ALTER TABLE ONLY thing
    ADD CONSTRAINT thing_pkey PRIMARY KEY (identifier);


--
-- PostgreSQL database dump complete
--


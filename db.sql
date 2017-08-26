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
    name text,
    image jsonb,
    description text,
    url text,
    sameas text
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
-- Name: organization; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE organization (
    address jsonb,
    logo jsonb,
    email text,
    telephone text,
    faxnumber text
)
INHERITS (thing);


ALTER TABLE organization OWNER TO shgysk8zer0;

--
-- Name: person; Type: TABLE; Schema: public; Owner: shgysk8zer0
--

CREATE TABLE person (
    givenname text,
    additionalname text,
    familyname text,
    address jsonb,
    worksfor jsonb,
    email text,
    jobtitle text
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
    streetaddress text,
    postalcode integer
)
INHERITS (contactpoint);


ALTER TABLE postaladdress OWNER TO shgysk8zer0;

--
-- Data for Name: contactpoint; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY contactpoint (identifier, name, image, description, contacttype, url, sameas) FROM stdin;
\.


--
-- Data for Name: creativework; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY creativework (identifier, name, image, description, author, url, sameas) FROM stdin;
\.


--
-- Data for Name: imageobject; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY imageobject (identifier, name, image, description, author, width, height, uploaddate, caption, thumbnail, url, sameas) FROM stdin;
c8e55ab3c0d634f23b25a65bbe5590e7	\N	\N	\N	\N	128	128	\N	Christopher Wayne Zuber (Gravatar)	\N	https://gravatar.com/avatar/73f08dc9b030c584e76a4c3c4e8a56c0?s=128	\N
a2abad1b96a1d31623cad7bc90c16164	\N	\N	\N	\N	\N	\N	\N	\N	\N	https://chriszuber.com/favicon.svg	\N
\.


--
-- Data for Name: intangible; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY intangible (identifier, name, image, description, url, sameas) FROM stdin;
\.


--
-- Data for Name: mediaobject; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY mediaobject (identifier, name, image, description, author, width, height, uploaddate, url, sameas) FROM stdin;
\.


--
-- Data for Name: organization; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY organization (identifier, name, image, description, address, logo, email, telephone, faxnumber, url, sameas) FROM stdin;
c48bf1f0c04e18679bf3e0108c8b2bcd	Super User Dev	\N	\N	\N	{"@id": "be8acf6cd3a83ee94d6b8dd44df6c997", "@type": "ImageObject"}	\N	\N	\N	https://github.com/SuperUserDev	\N
\.


--
-- Data for Name: person; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY person (identifier, name, image, description, givenname, additionalname, familyname, address, worksfor, url, email, jobtitle, sameas) FROM stdin;
\.


--
-- Data for Name: postaladdress; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY postaladdress (identifier, name, image, description, contacttype, addresscountry, addresslocality, addressregion, postofficeboxnumber, streetaddress, postalcode, url, sameas) FROM stdin;
c29579ea926de36d0004d88de101d617	\N	\N	\N	\N	\N	Mount Vernon	WA	\N	\N	98274	\N	\N
\.


--
-- Data for Name: structuredvalue; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY structuredvalue (identifier, name, image, description, url, sameas) FROM stdin;
\.


--
-- Data for Name: thing; Type: TABLE DATA; Schema: public; Owner: shgysk8zer0
--

COPY thing (identifier, name, image, description, url, sameas) FROM stdin;
\.


--
-- Name: thing thing_pkey; Type: CONSTRAINT; Schema: public; Owner: shgysk8zer0
--

ALTER TABLE ONLY thing
    ADD CONSTRAINT thing_pkey PRIMARY KEY (identifier);


--
-- PostgreSQL database dump complete
--


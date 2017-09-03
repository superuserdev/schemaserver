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

DROP TABLE IF EXISTS "Thing" CASCADE;

--
-- Name: thing; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Thing" (
    "identifier" "text" NOT NULL,
    "name" "text",
    "image" "jsonb",
    "description" "text",
    "url" "text",
    "sameAs" "text",
    "alternateName" "text",
    "disambiguatingDescription" "text",
    "mainEntityOfPage" "jsonb"
);


--
-- Name: Intangible; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Intangible" (
) INHERITS ("Thing");

--
-- Name: StructuredValue; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "StructuredValue" (
) INHERITS ("Intangible");

--
-- Name: Enumeration; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Enumeration" (
    "supersededBy" "jsonb"
) INHERITS ("Intangible");

--
-- Name: Property; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Property" (
    "category" "jsonb",
    "inverseOf" "jsonb",
    "supersededBy" "jsonb"
) INHERITS ("Intangible");

--
-- Name: Quantity; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Quantity" (
) INHERITS ("Intangible);

--
-- Name: Action; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Action" (
    "actionStatus" "jsonb",
    "agent"  "text",
    "endDate" "date",
    "error" "jsonb",
    "location" "jsonb",
    "object" "jsonb",
    "participant" "jsonb",
    "result" "jsonb",
    "startDate" "date",
    "target" "jsonb"
) INHERITS ("Thing");

--
-- Name: ContactPoint; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "ContactPoint" (
    "contacttype" "text"
) INHERITS ("StructuredValue");


--
-- Name: CreativeWork; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "CreativeWork" (
    "about" "jsonb",
    "accessMode" "text",
    "accessModeSufficient" "text",
    "accessibilityAPI" "text",
    "accessibilityFeature" "text",
    "accessibilityHazard" "text",
    "accessibilitySummary" "text",
    "accountablePerson" "jsonb",
    "aggregateRating" "jsonb",
    "alternativeHeadline" "text",
    "audience" "jsonb",
    "audio" "jsonb",
    "author" "jsonb",
    "award" "text",
    "character" "jsonb",
    "citation" "jsonb",
    "comment" "jsonb",
    "commentCount" integer,
    "contentLocation" "jsonb",
    "contentRating" "jsonb",
    "contributor" "jsonb",
    "copyrightHolder" "jsonb",
    "copyrightYear" integer,
    "creator" "jsonb",
    "dateCreated" "date",
    "dateModified" "date",
    "datePublished" "date",
    "discussionUrl" "text",
    "editor" "jsonb",
    "educationalAlignment" "jsonb",
    "educationalUse" "text",
    "encoding" "jsonb",
    "exampleOfWork" "jsonb",
    "fileFormat" "text"
) INHERITS ("Thing");


--
-- Name: MediaObject; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "MediaObject" (
    "width" integer,
    "height" integer,
    "uploadDate" "date"
) INHERITS ("CreativeWork");


--
-- Name: ImageObject; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "ImageObject" (
    "caption" "text",
    "thumbnail" "jsonb"
) INHERITS ("MediaObject");


--
-- Name: Organization; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Organization" (
    "address" "jsonb",
    "logo" "jsonb",
    "email" "text",
    "telephone" "text",
    "faxNumber" "text"
) INHERITS ("Thing");


--
-- Name: Person; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Person" (
    "givenName" "text",
    "additionalName" "text",
    "familyName" "text",
    "address" "jsonb",
    "worksFor" "jsonb",
    "email" "text",
    "jobTitle" "text"
) INHERITS ("Thing");


--
-- Name: PostalAddress; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "PostalAddress" (
    "addressCountry" "text",
    "addressLocality" "text",
    "addressRegion" "text",
    "postOfficeBoxNumber" integer,
    "streetAddress" "text",
    "postalCode" integer
) INHERITS ("ContactPoint");


--
-- Name: ActionStatusType; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "ActionStatusType" (
) INHERITS ("Enumeration");

--
-- Name: AdministrativeArea; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "AdministrativeArea" (
) INHERITS ("Place");

--
-- Name: Review; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Review" (
    "itemReviewed" "jsonb",
    "reviewBody" "text",
    "reviewRating" "jsonb"
) INHERITS ("CreativeWork");

--
-- Name: Rating; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Rating" (
    "author" "jsonb",
    "bestRating" integer,
    "ratingValue" integer,
    "worstRating" integer
) INHERITS ("Intangible");

--
-- Name: AggregateRating; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "AggregateRating" (
    "itemReviewed" "jsonb",
    "ratingCount" integer,
    "reviewCount" integer
) INHERITS ("Rating");

--
-- Name: Comment; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Comment" (
    "downVoteCount" integer,
    "parentItem" "jsonb",
    "upvoteCount" integer
) INHERITS ("CreativeWork");

--
-- Name: Answer; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Answer" (
) INHERITS ("Comment");

--
-- Name: Question; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Question" (
    "acceptedAnswer" "jsonb",
    "answerCount" integer,
    "downVoteCount" integer,
    "suggestedAnswer" "jsonb",
    "upvoteCount" integer
) INHERITS ("CreativeWork");

--
-- Name: Article; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Article" (
    "articleBody" "text",
    "articleSection" "text",
    "pageEnd" integer,
    "pageStart" integer,
    "pagination" "text",
    "wordCount" integer
) INHERITS ("CreativeWork");

--
-- Name: Audience; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Audience" (
    "audienceType" "text",
    "geographicArea" "jsonb"
) INHERITS ("Intangible");

--
-- Name: AudioObject; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "AudioObject" (
    "transcript" "text"
) INHERITS ("MediaObject");

--
-- Name: Book; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Book" (
    "abridged" Boolean,
    "bookEdition" "text",
    "bookFormat" "jsonb",
    "illustrator" "jsonb",
    "isbn" "text",
    "numberOfPages" integer
) INHERITS ("CreativeWork");

--
-- Name: BookFormatType; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "BookFormatType" (
) INHERITS ("Enumeration");

--
-- Name: Brand; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Brand" (
    "aggregateRating" "jsonb",
    "logo" "jsonb",
    "review" "jsonb"
) INHERITS ("Intangible");

--
-- Name: ItemList; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "ItemList" (
    "itemListElement" "jsonb",
    "itemListOrder" "jsonb",
    "numberOfItems" integer
) INHERITS ("Intangible");

--
-- Name: BreadCrumbList; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "BreadcrumbList" (
) INHERITS ("ItemList");

--
-- Name: Distance; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Distance" (
) INHERITS ("Quantity");

--
-- Name: Country; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Country" (
) INHERITS ("AdministrativeArea");

--
-- Name: DayOfWeek; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "DayOfWeek" (
) INHERITS ("Enumeration");

--
-- Name: Event; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "Event" (
    "about" "jsonb",
    "endDate" "date",
    "location" "jsonb",
    "organizer" "jsonb",
    "startDate" "date"
) INHERITS ("Thing");

--
-- Name: EntryPoint; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "EntryPoint" (
    "actionApplication" "jsonb",
    "actionPlatform" "text",
    "contentType" "text",
    "encodingType" "text",
    "httpMethod" "text",
    "urlTemplate" "text"
) INHERITS ("Intangible");

--
-- Name: GeoCoordinates; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE "GeoCoordinates" (
    "addressCountry" "jsonb",
    "elevation" real,
    "latitude" double precision,
    "longitude" double precision,
    "postalCode" real
) INHERITS ("StructuredValue");

--
-- Name: thing thing_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "Thing"
    ADD CONSTRAINT "thing_pkey" PRIMARY KEY ("identifier");


--
-- Name: public; Type: ACL; Schema: -; Owner: -
--

GRANT ALL ON SCHEMA "public" TO PUBLIC;


--
-- PostgreSQL database dump complete
--

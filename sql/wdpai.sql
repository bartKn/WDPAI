/*
 Navicat Premium Data Transfer

 Source Server         : WdPAI
 Source Server Type    : PostgreSQL
 Source Server Version : 130007
 Source Host           : wdpai.cmlgel1zl6jj.eu-west-3.rds.amazonaws.com:5432
 Source Catalog        : wdpai
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 130007
 File Encoding         : 65001

 Date: 21/01/2023 15:25:53
*/


-- ----------------------------
-- Sequence structure for Event_types_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Event_types_id_seq";
CREATE SEQUENCE "public"."Event_types_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."Event_types_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for Events_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Events_id_seq";
CREATE SEQUENCE "public"."Events_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."Events_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for daily_runs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."daily_runs_id_seq";
CREATE SEQUENCE "public"."daily_runs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."daily_runs_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for teams_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."teams_id_seq";
CREATE SEQUENCE "public"."teams_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."teams_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."users_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Table structure for daily_runs
-- ----------------------------
DROP TABLE IF EXISTS "public"."daily_runs";
CREATE TABLE "public"."daily_runs" (
  "creator_id" int4 NOT NULL,
  "id" int4 NOT NULL DEFAULT nextval('daily_runs_id_seq'::regclass),
  "start_point" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "time" time(6) NOT NULL,
  "distance" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "pace" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "date" date NOT NULL DEFAULT CURRENT_DATE
)
;
ALTER TABLE "public"."daily_runs" OWNER TO "postgres";

-- ----------------------------
-- Records of daily_runs
-- ----------------------------
BEGIN;
INSERT INTO "public"."daily_runs" ("creator_id", "id", "start_point", "time", "distance", "pace", "date") VALUES (18, 20, 'My first run start point', '23:45:00', '12 km', '4:45 min/km', '2023-01-13');
INSERT INTO "public"."daily_runs" ("creator_id", "id", "start_point", "time", "distance", "pace", "date") VALUES (17, 17, 'First Run Start Point', '22:30:00', '15 km', '5:45 min/km', '2022-12-10');
INSERT INTO "public"."daily_runs" ("creator_id", "id", "start_point", "time", "distance", "pace", "date") VALUES (17, 18, 'Second Run Start Point', '23:30:00', '6 km', '4:15 min/km', '2022-12-13');
INSERT INTO "public"."daily_runs" ("creator_id", "id", "start_point", "time", "distance", "pace", "date") VALUES (17, 19, 'Third Run Start Point', '20:00:00', '10 km', '5:00 min/km', '2023-01-21');
COMMIT;

-- ----------------------------
-- Table structure for daily_runs_participants
-- ----------------------------
DROP TABLE IF EXISTS "public"."daily_runs_participants";
CREATE TABLE "public"."daily_runs_participants" (
  "run_id" int4 NOT NULL,
  "user_id" int4 NOT NULL
)
;
ALTER TABLE "public"."daily_runs_participants" OWNER TO "postgres";

-- ----------------------------
-- Records of daily_runs_participants
-- ----------------------------
BEGIN;
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (17, 17);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (18, 17);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (19, 17);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (17, 18);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (18, 18);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (19, 18);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (20, 18);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (18, 19);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (20, 19);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (17, 22);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (18, 20);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (19, 20);
INSERT INTO "public"."daily_runs_participants" ("run_id", "user_id") VALUES (20, 23);
COMMIT;

-- ----------------------------
-- Table structure for event_participants
-- ----------------------------
DROP TABLE IF EXISTS "public"."event_participants";
CREATE TABLE "public"."event_participants" (
  "event_id" int4 NOT NULL,
  "user_id" int4 NOT NULL,
  "finish_position" int2
)
;
ALTER TABLE "public"."event_participants" OWNER TO "postgres";

-- ----------------------------
-- Records of event_participants
-- ----------------------------
BEGIN;
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (23, 17, 4);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (23, 18, 3);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (23, 19, 2);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (23, 20, 1);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (23, 21, 5);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (23, 22, 6);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (21, 17, NULL);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (21, 18, NULL);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (20, 19, NULL);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (20, 22, NULL);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (20, 20, NULL);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (20, 23, NULL);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (22, 17, 3);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (22, 18, 1);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (22, 19, 5);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (22, 20, 6);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (22, 21, 2);
INSERT INTO "public"."event_participants" ("event_id", "user_id", "finish_position") VALUES (22, 22, 4);
COMMIT;

-- ----------------------------
-- Table structure for event_types
-- ----------------------------
DROP TABLE IF EXISTS "public"."event_types";
CREATE TABLE "public"."event_types" (
  "id" int4 NOT NULL DEFAULT nextval('"Event_types_id_seq"'::regclass),
  "type_name" varchar(255) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."event_types" OWNER TO "postgres";

-- ----------------------------
-- Records of event_types
-- ----------------------------
BEGIN;
INSERT INTO "public"."event_types" ("id", "type_name") VALUES (2, 'Asphalt');
INSERT INTO "public"."event_types" ("id", "type_name") VALUES (3, 'Mixed');
INSERT INTO "public"."event_types" ("id", "type_name") VALUES (1, 'Trail');
COMMIT;

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS "public"."events";
CREATE TABLE "public"."events" (
  "id" int4 NOT NULL DEFAULT nextval('"Events_id_seq"'::regclass),
  "team_id" int4 NOT NULL,
  "event_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "date" timestamp(6) NOT NULL,
  "location" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "type_id" int4 NOT NULL,
  "distance" int4 NOT NULL,
  "total_participants" int4 NOT NULL,
  "signed_participants" int4 NOT NULL DEFAULT 0,
  "track_path" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."events" OWNER TO "postgres";

-- ----------------------------
-- Records of events
-- ----------------------------
BEGIN;
INSERT INTO "public"."events" ("id", "team_id", "event_name", "date", "location", "type_id", "distance", "total_participants", "signed_participants", "track_path") VALUES (21, 6, 'First February Event', '2023-02-01 08:00:00', 'First February Event Location', 1, 30, 2, 2, '/public/uploads/events/track2.png');
INSERT INTO "public"."events" ("id", "team_id", "event_name", "date", "location", "type_id", "distance", "total_participants", "signed_participants", "track_path") VALUES (20, 6, 'First event of First Team', '2023-01-28 14:00:00', 'First event Location', 1, 42, 100, 4, '/public/uploads/events/track.png');
INSERT INTO "public"."events" ("id", "team_id", "event_name", "date", "location", "type_id", "distance", "total_participants", "signed_participants", "track_path") VALUES (22, 6, 'Finished Event', '2023-01-07 09:00:00', 'Finished Event Location', 3, 34, 10, 6, '/public/uploads/events/track.png');
INSERT INTO "public"."events" ("id", "team_id", "event_name", "date", "location", "type_id", "distance", "total_participants", "signed_participants", "track_path") VALUES (23, 6, 'Another Finished Event', '2022-12-01 14:00:00', 'Example Location', 2, 15, 10, 6, '/public/uploads/events/track.png');
COMMIT;

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS "public"."teams";
CREATE TABLE "public"."teams" (
  "id" int4 NOT NULL DEFAULT nextval('teams_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."teams" OWNER TO "postgres";

-- ----------------------------
-- Records of teams
-- ----------------------------
BEGIN;
INSERT INTO "public"."teams" ("id", "name") VALUES (6, 'First Team!');
INSERT INTO "public"."teams" ("id", "name") VALUES (7, 'Second Team!!');
COMMIT;

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_info";
CREATE TABLE "public"."user_info" (
  "user_id" int4 NOT NULL,
  "team_id" int4,
  "photo_path" varchar(255) COLLATE "pg_catalog"."default" DEFAULT '/public/img/defaultAvatar.png'::character varying,
  "location" varchar(255) COLLATE "pg_catalog"."default",
  "logged_in" bool NOT NULL DEFAULT false,
  "role" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'user'::character varying
)
;
ALTER TABLE "public"."user_info" OWNER TO "postgres";

-- ----------------------------
-- Records of user_info
-- ----------------------------
BEGIN;
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (19, NULL, '/public/img/defaultAvatar.png', 'Cracow', 'f', 'user');
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (22, 6, '/public/img/defaultAvatar.png', 'Cracow', 'f', 'user');
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (20, 6, '/public/img/defaultAvatar.png', 'Cracow', 'f', 'user');
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (23, 7, '/public/img/defaultAvatar.png', 'Cracow', 'f', 'user');
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (18, 6, '/public/img/defaultAvatar.png', 'Cracow', 'f', 'user');
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (17, 6, '/public/uploads/profile/profile-pic.jpg', 'Cracow', 'f', 'user');
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (16, NULL, '/public/img/defaultAvatar.png', 'admin', 'f', 'admin');
INSERT INTO "public"."user_info" ("user_id", "team_id", "photo_path", "location", "logged_in", "role") VALUES (21, NULL, '/public/img/defaultAvatar.png', 'Cracow', 'f', 'user');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "surname" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."users" OWNER TO "postgres";

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (16, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$lx4LaBS0dqQ1cLMjGWd.JOwutU7SyzlS0eTxLWDkYts9UT1TuUNq2');
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (17, 'John', 'Doe', 'john@email.com', '$2y$10$8sI.st5w7WXt8ZUPSEN8Ce0nJH0PJ6zfJgflm77wsX4ZROFMPDxA6');
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (18, 'Jane', 'Doe', 'jane@email.com', '$2y$10$O/zt5/i.KKFK4i6XAFi6NOwZVlIYMdWTMNC2LqlmwLGlCPQUrKWsq');
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (19, 'John', 'Snow', 'johnSnow@email.com', '$2y$10$1TcfnGNKcvUXMFeDKZ3eJe9FAF9tMUSJ4Mq/4iVDkvLC2OqqStZbG');
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (20, 'Jane', 'Snow', 'janeSnow@email.com', '$2y$10$cmcYjRYEllTdr0VGOhaRKOAZaA.bXd0WRAtKUCcSZkIJ6aqwEC9Xe');
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (21, 'John', 'Smith', 'johnSmith@email.com', '$2y$10$2.6EEJPVrLwGfjbFDUkbeOwOw91PZUNctFP9b6Mizoei77lijpJ9S');
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (22, 'Jane', 'Smith', 'janeSmith@email.com', '$2y$10$H680PC7CIbY5ITi8EXG5Ueb2/1ReNU042poXqwVg38YE/gkKm1ZVq');
INSERT INTO "public"."users" ("id", "name", "surname", "email", "password") VALUES (23, 'Bart', 'Kn', 'bartKn@email.com', '$2y$10$f8kCg/V/uckrpktHpoYzPuKj/vbcXdipHsjw6Fn1p7hWJs5bOkqKe');
COMMIT;

-- ----------------------------
-- Function structure for GetEventsDetails
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."GetEventsDetails"("event_id" int4);
CREATE OR REPLACE FUNCTION "public"."GetEventsDetails"("event_id" int4)
  RETURNS TABLE("id" int4, "event_name" varchar, "date" timestamp, "location" varchar, "type" varchar, "distance" int4, "total_participants" int4, "signed_participants" int4, "team_name" varchar) AS $BODY$BEGIN
		RETURN QUERY 
		SELECT events.id, events.event_name, events.date, events.location, et.type_name AS type, events.distance, 
			events.total_participants, events.signed_participants, t."name"
		FROM events
			JOIN teams AS t
				ON t.id = events.team_id
			JOIN event_types AS et
				ON et."id" = events.type_id
		WHERE events.id = event_id;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION "public"."GetEventsDetails"("event_id" int4) OWNER TO "postgres";

-- ----------------------------
-- Function structure for get_members_of_team
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."get_members_of_team"("id_of_team" int4);
CREATE OR REPLACE FUNCTION "public"."get_members_of_team"("id_of_team" int4)
  RETURNS "pg_catalog"."void" AS $BODY$BEGIN
  SELECT users."name", users.surname FROM users
	JOIN user_info
	ON users."id" = user_info."user_id"
	WHERE user_info.team_id = id_of_team;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."get_members_of_team"("id_of_team" int4) OWNER TO "postgres";

-- ----------------------------
-- Function structure for signupforevent
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."signupforevent"("_eventid" int4, "_userid" int4);
CREATE OR REPLACE FUNCTION "public"."signupforevent"("_eventid" int4, "_userid" int4)
  RETURNS "pg_catalog"."void" AS $BODY$
DECLARE
	signed int;
	total int;
BEGIN
		SELECT events.signed_participants, events.total_participants INTO signed, total FROM events WHERE events.id = _eventId;
		
		IF
			signed < total
		THEN
			UPDATE events SET signed_participants = signed_participants + 1 WHERE id = _eventid;
			INSERT INTO event_participants (event_id, user_id) VALUES (_eventId, _userId);
		END IF;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."signupforevent"("_eventid" int4, "_userid" int4) OWNER TO "postgres";

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Event_types_id_seq"
OWNED BY "public"."event_types"."id";
SELECT setval('"public"."Event_types_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Events_id_seq"
OWNED BY "public"."events"."id";
SELECT setval('"public"."Events_id_seq"', 23, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."daily_runs_id_seq"
OWNED BY "public"."daily_runs"."id";
SELECT setval('"public"."daily_runs_id_seq"', 20, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."teams_id_seq"
OWNED BY "public"."teams"."id";
SELECT setval('"public"."teams_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 23, true);

-- ----------------------------
-- Primary Key structure for table daily_runs
-- ----------------------------
ALTER TABLE "public"."daily_runs" ADD CONSTRAINT "daily_runs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table daily_runs_participants
-- ----------------------------
ALTER TABLE "public"."daily_runs_participants" ADD CONSTRAINT "daily_runs_participants_pkey" PRIMARY KEY ("run_id", "user_id");

-- ----------------------------
-- Primary Key structure for table event_participants
-- ----------------------------
ALTER TABLE "public"."event_participants" ADD CONSTRAINT "event_participants_pkey" PRIMARY KEY ("event_id", "user_id");

-- ----------------------------
-- Primary Key structure for table event_types
-- ----------------------------
ALTER TABLE "public"."event_types" ADD CONSTRAINT "Event_types_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "Events_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table teams
-- ----------------------------
ALTER TABLE "public"."teams" ADD CONSTRAINT "teams_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table user_info
-- ----------------------------
ALTER TABLE "public"."user_info" ADD CONSTRAINT "user_id_unique" UNIQUE ("user_id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table daily_runs
-- ----------------------------
ALTER TABLE "public"."daily_runs" ADD CONSTRAINT "daily_runs_creator_id_fkey" FOREIGN KEY ("creator_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table daily_runs_participants
-- ----------------------------
ALTER TABLE "public"."daily_runs_participants" ADD CONSTRAINT "daily_runs_participants_run_id_fkey" FOREIGN KEY ("run_id") REFERENCES "public"."daily_runs" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."daily_runs_participants" ADD CONSTRAINT "daily_runs_participants_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table event_participants
-- ----------------------------
ALTER TABLE "public"."event_participants" ADD CONSTRAINT "event_participants_event_id_fkey" FOREIGN KEY ("event_id") REFERENCES "public"."events" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."event_participants" ADD CONSTRAINT "event_participants_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "Events_team_id_fkey" FOREIGN KEY ("team_id") REFERENCES "public"."teams" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."events" ADD CONSTRAINT "Events_type_id_fkey" FOREIGN KEY ("type_id") REFERENCES "public"."event_types" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table user_info
-- ----------------------------
ALTER TABLE "public"."user_info" ADD CONSTRAINT "user_info_team_id_fkey" FOREIGN KEY ("team_id") REFERENCES "public"."teams" ("id") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."user_info" ADD CONSTRAINT "user_info_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

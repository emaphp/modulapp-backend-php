CREATE TABLE "notes" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "title" TEXT NOT NULL,
    "body" TEXT NOT NULL,
    "created_at" TEXT NOT NULL
);

CREATE TABLE "contacts" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "name" TEXT NOT NULL,
    "surname" TEXT DEFAULT (''),
    "phone" TEXT DEFAULT NULL,
    "email" TEXT DEFAULT NULL,
    "twitter" TEXT DEFAULT NULL
);

# noinspection SqlWithoutWhereForFile

DELETE FROM behaviorgraph;
DELETE FROM mbesresponse;
DELETE FROM journalentry;
DELETE FROM pendingconsultant;
DELETE FROM consultantclient;
DELETE FROM consultant;
DELETE FROM client;
DELETE FROM account;
ALTER TABLE behaviorgraph AUTO_INCREMENT = 1;
ALTER TABLE mbesresponse AUTO_INCREMENT = 1;
ALTER TABLE journalentry AUTO_INCREMENT = 1;
ALTER TABLE pendingconsultant AUTO_INCREMENT = 1;
ALTER TABLE consultantclient AUTO_INCREMENT = 1;
ALTER TABLE consultant AUTO_INCREMENT = 1;
ALTER TABLE client AUTO_INCREMENT = 1;
ALTER TABLE account AUTO_INCREMENT = 1;

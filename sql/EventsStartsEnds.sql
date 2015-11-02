#Rename dodgy 'end' field to 'ends'
ALTER TABLE `events`
CHANGE `end` `ends` DATETIME;

#Rename 'start' field to 'starts' for consistency with above
ALTER TABLE `events`
CHANGE `start` `starts` DATETIME;
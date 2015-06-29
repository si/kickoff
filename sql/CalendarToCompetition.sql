# Chane table name
RENAME TABLE `calendars` TO `competitions`;

# Update foreign key for events 
ALTER TABLE `competitions` CHANGE `calendar_id` `competition_id` INTEGER;
name 'base'
description 'Base role applied to all nodes.'
run_list(
  'recipe[timezone-ii]',
  'recipe[locales]',
  'recipe[apt]',
  'recipe[git]',
  'recipe[build-essential]',
  'recipe[vim]',
  'recipe[unattended-upgrades]'
)

override_attributes(
  :tz => 'Europe/Lisbon'
)

name 'ubicycling'
description 'UbiCycling specific project role for all nodes.'

run_list(
  'recipe[ubicycling::database_privileges]',
  'recipe[symfony2]',
  'recipe[composer]',
  'recipe[composer::self_update]',
  'recipe[ubicycling::virtualhost]'
)

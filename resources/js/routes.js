const appRoutes = [
 { 
 	path: '/home/users',
 	name: 'home.users',
 	component: require('./components/Users.vue').default
 },
 { 
 	path: '/home/announcements',
 	name: 'home.announcements',
 	component: require('./components/Announcements.vue').default
 },
 { 
 	path: '/home/survey',
 	name: 'home.survey',
 	component: require('./components/Survey.vue').default
 },
 { 
 	path: '/home/preferences',
 	name: 'home.preferences',
 	component: require('./components/Preferences.vue').default
 }
]

export default appRoutes
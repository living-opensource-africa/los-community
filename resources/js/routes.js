const appRoutes = [
 {
     path: '/home',
     name: 'home',
     component: require('./components/Home.vue').default
 },
 {
 	path: '/home/users',
 	name: 'home.users',
 	component: require('./components/Users.vue').default
 },
 {
	path: '/home/trainings',
	name: 'home.trainings',
	component: require('./components/Trainings.vue').default
 },
 {
	path: '/home/trainings/:id/view',
	name: 'home.trainings.view',
	component: require('./components/ViewTrainings.vue').default
 },
 {
	path: '/home/sketchpad',
	name: 'home.sketchpad',
	component: require('./components/SketchPad.vue').default
 },
 {
 	path: '/home/terminal',
 	name: 'home.terminal',
 	component: require('./components/Terminal.vue').default
 },
 {
 	path: '/home/Knowledge',
 	name: 'home.knowledge',
 	component: require('./components/KnowledgeBase.vue').default
 },
 {
 	path: '/home/preferences',
 	name: 'home.preferences',
 	component: require('./components/Preferences.vue').default
 }
]

export default appRoutes

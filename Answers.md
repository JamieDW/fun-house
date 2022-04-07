Answers

How long did you spend on the coding test?
 - 2-3 hours

What would you add to your solution if you had more time?
 - Add more useful functions for the manager such as.
 	1. Calculate weekly single manning minutes
 	2. Get daily/weekly manning minutes per staff member
 	3. Get total overlapping minutes between staff members (opposite of single manning minutes)

Why did you choose PHP as your main programming language?
 - Ive worked with PHP throughout my career and am most comfortable using it then other programming languages.

What is your favourite thing about your most familar PHP framework (Laravel / Symfony etc)?
 - Eloquent query builder. Eloquent if very powerful when used correctly, you can do very complex SQL queries with a simple eloquent query.
 - Collections, again very powerful when chaining certain methods together you can create a very easy to understand method chain
   without having to create a lot of boiler plate code which can be sometimes hard to follow. i.e $rota->staffs->pluck('pivot.start_time')->min();

What is your least favourite thing about the above framework?
 - Laravel is a very opinionated framework, this is it's main downfall. For new developers it can be quite difficult to pick up the framework
   as it has a lot of niche features and syntax sugar a new developer will not understand initially. Yes laravel makes things easier but as a developer you want to see the underlying functions, 
   I.e complex eloquent queries, the developer may never see the underlying Sql query which was generated and may not be aware of database queries. Same goes for collections, a lot of boiler plate code is covered over with simple functions like 'map' or 'pluck'.
	
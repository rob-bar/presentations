# Git guidelines & workflow example
## Project look & feel "not to many files"

	/js
		base.js
		jquery.js
	/css
		style.css
	/img
		image.jpg
	index.html
	final.html
	unwantedfile.html
	README.md
	/.git
	.gitignore

## DEMO

* [J]
	* create repo on beanstalk
	* basic setting , hipchat link
	* Git init project
	* explaining and adding origin
	* readme
	* git pull
	* change README.md
	* add / commit README.md
	* push

* [R]
	* Git clone zonder folder naam
	* add js folder and add base & jquery
	* git status
	* explain stage & working copy
	* add unwanted file
	* .gitignore unwantedfile.html
	* add / commit
	* push

* [J]
	*	pull
	* add img image.jpg
	*	commit
	* create new branch styles
	* explain branches, checkout master branch etc.
	* add css/ and css/style.css to styles
	* commit
	*	push

* [R]
	* pull
	* git branch -r / -a
	* explain remote and local branches
	* switch to styles
	* explain difference between filestructure while checking out
	* switch back to master
	* add .gitkeep
	* commit
	* push

* [J]
	* pull
	* merge styles with master
	* explain what happens when merging & explain that you merge into the branch you are on
	* commit
	* push

* [R]
	* pull
	* make changes to style.css
	* make changes to README.md
	* make changes on index.html first line
	* add stye.css /commit
	* git diff index commit with HEAD
	* add README.md /commit
	* add index.html /commit
	* run globrnp to see all changes to be pushed
	* push changes

* [J]
	* make changes on index.html first line
	* add index.html /commit
	* pull
	* mark conflict
	* show how to resolve
	* explain extra git syntax
	* git status
	* push

* [R]
	* pull
	* run git whatchanged to mark whatchanged
	* run glogap glogad
	* mark the hashes and how they are the id's of git
	* run git checkout to first commit
	* and create branch from first commit
	* add final.html
	*	git push

* [J]
	* git pull
	* show final file
	* run git help --all to mark that whe have only scratched the surface
	* end
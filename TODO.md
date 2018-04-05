<div id="table-of-contents">
<h2>Table of Contents</h2>
<div id="text-table-of-contents">
<ul>
<li><a href="#sec-1">1. List of features to implement</a>
<ul>
<li><a href="#sec-1-1">1.1. User interface for students <code>[0/3]</code></a></li>
<li><a href="#sec-1-2">1.2. User interface for tutors <code>[0/5]</code></a></li>
<li><a href="#sec-1-3">1.3. Tutorial framework <code>[0/2]</code></a></li>
<li><a href="#sec-1-4">1.4. Editor <code>[1/4]</code></a></li>
<li><a href="#sec-1-5">1.5. Terminal <code>[1/4]</code></a></li>
<li><a href="#sec-1-6">1.6. Analytic Engine <code>[0/2]</code></a></li>
</ul>
</li>
</ul>
</div>
</div>

PS: do not edit the TODO.md file, as it is generated. Make necessary edits to the TODO.org file, push and let me know.

# List of features to implement<a id="sec-1" name="sec-1"></a>

## User interface for students <code>[0/3]</code><a id="sec-1-1" name="sec-1-1"></a>

-   [ ] Allow students to register and login
    -   Perhaps we can allow the students to register using their own emails, but their NIC and reg.no will be checked with our database before registering them.
-   [ ] Basic user settings. <code>[0/3]</code>
    -   [ ] Edit profile info
    -   [ ] Perhaps allow editing themes
    -   [ ] misc&#x2026;..
    -   Can we make this like an official public page of the student?? just throwing it out there.
-   [ ] Browse and interact with files and system. <code>[0/4]</code>
    -   Does this include only editable files or do we include compiled files to be displayed? How does the interaction with the two types of files work?
    -   [ ] Allow for a meaningful grouping of files. (maybe projects or course)
    -   [ ] Basic file management (create/save/edit/delete/move/rename)
    -   [ ] View files in place, and in editor.
    -   [ ] Run a particular command at a specific place (eg: ls, cd, gcc, etc.)

## User interface for tutors <code>[0/5]</code><a id="sec-1-2" name="sec-1-2"></a>

-   [ ] Register and login.
    -   How does this work?
-   [ ] View student information and files.
    -   Are we to allow tutors view any and all files of students? Are there any restrictions?
-   [ ] Add a practical/ tutorial/ lab sheet for students.
-   [ ] Mechanism to assess a practical/ tutorial/ lab.
-   [ ] Perhaps mechanism to share permission of certain action with other tutors.
-   [ ] Get statistics and analysis of student work and behavior.

## Tutorial framework <code>[0/2]</code><a id="sec-1-3" name="sec-1-3"></a>

-   [ ] Define templates for practical/ tutorial/ lab sheets, along with how it is to be evaluated.
    -   The templates are stored as XML files. This can be generated using a web interface.
    -   The student answers also can use the same format.
    -   When the student or tutor downloads the tutorial the file can be formatted as a pdf file.
    -   The file will include:
        -   The course (which can be used to generate appropriate files for the students).
        -   The tutors name (So we know who to blame when shit hits the fan).
        -   A reference number, which can be used to access the particular tutorial/whatever through a database for any number of reasons.
        -   Several types of nodes:
            -   Editor, which will be used to place an editor in that space. (Maybe similar to jupyter notebooks kernal?)
            -   Questions, does this just include text descriptions or is a editor must? and are we to include more fine grained details to assist the evaluation framework.
            -   Descriptions, which are not related to questions, but general statements and such.
            -   Visual element, as it sounds. So we can include a proper process to processing this at different stages.
            -   Code snippets, is it different from visual elements?
-   [ ] Process templates.
    -   [ ] Generate  practical/ tutorial/ lab sheets for students.
    -   [ ] Generate evaluation framework for tutor.
    -   [ ] Generate monitoring framework for tutor.

## Editor <code>[1/4]</code><a id="sec-1-4" name="sec-1-4"></a>

-   [X] Basic editor. (ace)
-   [ ] Change syntax highlighting based on file extension.
-   [ ] Tabs
-   [ ] Basic operations on file (save/rename/delete/move/compile(based on the language)) <code>[0/1]</code> 
    -   [ ] Save
    -   [ ] Compile. Are we to allow this from the editor or have the student execute a command form the terminal emulator?
-   [ ] Change editor theme.

## Terminal <code>[1/4]</code><a id="sec-1-5" name="sec-1-5"></a>

-   [X] Basic terminal.
-   [ ] Build permitted commands to execute.
-   [ ] Filter command requests.
-   [ ] Run command in an isolated environment.
    -   How can this be done?

## Analytic Engine <code>[0/2]</code><a id="sec-1-6" name="sec-1-6"></a>

-   [ ] Analysis on typing behavior of students. <code>[0/2]</code>
    -   [ ] Obtaining keystroke information and efficiently storing it.
    -   [ ] Generate analysis information.
-   [ ] Analysis on class/batch wide file comparison. <code>[0/1]</code>
    -   [ ] Similarity metrics between files.
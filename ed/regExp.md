RegExp
-

| syntax                                   | description |
|------------------------------------------|-------------|
|^                                         | start of string |
|\A                                        | start of string |
|$                                         | end of string |
|\Z                                        | end of string |
|.                                         | any single character |
|\                                         | escape |
|0                                         | 0 or more |
|+                                         | repetitive match, 1 or more |
|?                                         | optional match, 0 or 1 |
|{3}                                       | exactly 3 |
|{3,}                                      | 3 or more |
|{3,5}                                     | 3 or 4 or 5 |
|[abc]                                     | range (a or b or c) |
|[^abc]                                    | not a not b not c |
|[a-q]                                     | letter between a and q |
|[A-Q]                                     | upper case letter between A and Q |
|[0-7]                                     | digit between 0 and 7 |
|(...)                                     | group |
|(?:...)                                   | pasive group |
|\0                                        | null |
|\t                                        | tab |
|\n                                        | new line |
|\v                                        | vertical tab |
|\f                                        | new page |
|\r                                        | return |
|\c                                        | control character |
|\s                                        | white space |
|\S                                        | not white space |
|\d                                        | digit |
|\D                                        | not digit |
|\w                                        | word |
|\W                                        | not word |
|\x                                        | hexadecimal digit |
|\O                                        | octal digit |
|\b                                        | word boundary |
|\B                                        | not word boundary |
|\<                                        | start of word |
|\>                                        | end of word |
|?=                                        | lookahead assertion |
|?!                                        | negative lookahead |
|?<=                                       | lookbehind assetion |
| ?! or ?<!                                | negative lookbehind |
| ?>                                       | once-only sebexpression |
| /?(condition)true-pattern|false-pattern/ | condition |
| /?(condition)true-pattern/               | condition |
| ?#                                       | comment |
| (?:...)                                  | just group, cannot be linked by \1 |
| \1\2                                     | back reference to matches that was in (...) |
| $1                                       | |
| $2                                       | |
| $`                                       | before matched string |
| $'                                       | after matched string |
| $+                                       | last matched string |

|   |   |
|---|---|
| i | case insensitive |
| g | global search |
| m | multiple lines |
| s | treat string as single line |
| x | allow comments and white space in pattern |
| e | evaluate replacement |
| u | upgready |

````
/Jave(?!Script)/ - Java, not Script
/[Jj]ava(?=\:)/ - Java with : but don't include : to ruzult

/a*?b/
/foo(?=bar)/
/^(?=q)qu|f)/
/(?<!foo)bar/
/(?:h.*)(f.*)/
/(?<=td)/
/(?<!td)/
/(['"])[^'"]*\1/
````

````
grep '$DC' # environment var
grep -Pz 'r\nw' # match new line pattern
````
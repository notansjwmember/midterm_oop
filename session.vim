let SessionLoad = 1
let s:so_save = &g:so | let s:siso_save = &g:siso | setg so=0 siso=0 | setl so=-1 siso=-1
let v:this_session=expand("<sfile>:p")
silent only
silent tabonly
cd ~/code/activity-php/midterm_oop
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
let s:shortmess_save = &shortmess
if &shortmess =~ 'A'
  set shortmess=aoOA
else
  set shortmess=aoO
endif
badd +399 ~/code/activity-php/midterm_oop/index.php
badd +4 styles/components/_table.scss
badd +26 styles/base/_reset.scss
badd +6 styles/base/_variables.scss
badd +4 styles/base/_mixins.scss
badd +26 styles/components/_form.scss
argglobal
%argdel
edit ~/code/activity-php/midterm_oop/index.php
let s:save_splitbelow = &splitbelow
let s:save_splitright = &splitright
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
wincmd _ | wincmd |
split
1wincmd k
wincmd w
let &splitbelow = s:save_splitbelow
let &splitright = s:save_splitright
wincmd t
let s:save_winminheight = &winminheight
let s:save_winminwidth = &winminwidth
set winminheight=0
set winheight=1
set winminwidth=0
set winwidth=1
exe 'vert 1resize ' . ((&columns * 141 + 141) / 283)
exe '2resize ' . ((&lines * 32 + 39) / 79)
exe 'vert 2resize ' . ((&columns * 141 + 141) / 283)
exe '3resize ' . ((&lines * 44 + 39) / 79)
exe 'vert 3resize ' . ((&columns * 141 + 141) / 283)
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
8,12fold
19,22fold
18,24fold
16,25fold
29,35fold
38,39fold
37,40fold
28,41fold
49,54fold
48,55fold
57,59fold
47,60fold
71,73fold
69,74fold
76,78fold
80,82fold
84,86fold
90,94fold
88,95fold
97,99fold
101,103fold
105,107fold
109,111fold
67,112fold
118,122fold
117,123fold
116,125fold
127,129fold
136,139fold
135,140fold
133,141fold
131,142fold
144,146fold
153,157fold
152,158fold
160,161fold
150,162fold
148,163fold
115,164fold
65,165fold
169,170fold
172,173fold
168,174fold
45,175fold
44,177fold
15,178fold
195,196fold
194,197fold
200,201fold
210,213fold
204,214fold
224,227fold
222,228fold
229,231fold
235,239fold
219,240fold
241,242fold
254,256fold
259,264fold
250,265fold
269,272fold
276,277fold
268,278fold
292,296fold
297,301fold
285,302fold
312,313fold
316,317fold
306,320fold
324,326fold
323,330fold
338,342fold
337,346fold
350,354fold
349,358fold
369,374fold
375,376fold
382,385fold
393,394fold
396,398fold
392,399fold
406,410fold
405,411fold
390,412fold
416,420fold
380,421fold
361,424fold
183,425fold
let &fdl = &fdl
let s:l = 399 - ((34 * winheight(0) + 38) / 76)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 399
normal! 016|
wincmd w
argglobal
if bufexists(fnamemodify("styles/components/_table.scss", ":p")) | buffer styles/components/_table.scss | else | edit styles/components/_table.scss | endif
if &buftype ==# 'terminal'
  silent file styles/components/_table.scss
endif
balt styles/components/_form.scss
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
10,13fold
4,14fold
18,20fold
23,30fold
33,41fold
50,52fold
60,62fold
65,66fold
55,67fold
44,68fold
72,75fold
78,82fold
85,86fold
let &fdl = &fdl
let s:l = 5 - ((1 * winheight(0) + 15) / 31)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 5
normal! 0
wincmd w
argglobal
if bufexists(fnamemodify("styles/base/_mixins.scss", ":p")) | buffer styles/base/_mixins.scss | else | edit styles/base/_mixins.scss | endif
if &buftype ==# 'terminal'
  silent file styles/base/_mixins.scss
endif
balt styles/base/_variables.scss
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
3,5fold
8,12fold
let &fdl = &fdl
let s:l = 13 - ((12 * winheight(0) + 21) / 43)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 13
normal! 0
wincmd w
exe 'vert 1resize ' . ((&columns * 141 + 141) / 283)
exe '2resize ' . ((&lines * 32 + 39) / 79)
exe 'vert 2resize ' . ((&columns * 141 + 141) / 283)
exe '3resize ' . ((&lines * 44 + 39) / 79)
exe 'vert 3resize ' . ((&columns * 141 + 141) / 283)
tabnext 1
if exists('s:wipebuf') && len(win_findbuf(s:wipebuf)) == 0 && getbufvar(s:wipebuf, '&buftype') isnot# 'terminal'
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20
let &shortmess = s:shortmess_save
let &winminheight = s:save_winminheight
let &winminwidth = s:save_winminwidth
let s:sx = expand("<sfile>:p:r")."x.vim"
if filereadable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &g:so = s:so_save | let &g:siso = s:siso_save
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :

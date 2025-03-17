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
badd +174 ~/code/activity-php/midterm_oop/index.php
badd +28 styles/components/_table.scss
badd +40 styles/base/_reset.scss
badd +13 styles/base/_variables.scss
badd +2 styles/base/_mixins.scss
badd +12 styles/components/_form.scss
badd +36 api/users.php
badd +38 styles/utils/_button.scss
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
exe '2resize ' . ((&lines * 59 + 39) / 78)
exe 'vert 2resize ' . ((&columns * 141 + 141) / 283)
exe '3resize ' . ((&lines * 16 + 39) / 78)
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
193,194fold
192,195fold
198,199fold
208,211fold
202,212fold
222,225fold
220,226fold
227,229fold
233,237fold
217,238fold
239,240fold
252,254fold
257,262fold
248,263fold
272,275fold
279,280fold
267,281fold
302,305fold
301,306fold
313,320fold
321,326fold
293,327fold
336,341fold
335,343fold
348,349fold
352,353fold
331,356fold
360,362fold
367,368fold
359,369fold
376,380fold
375,384fold
388,392fold
387,396fold
411,416fold
417,418fold
423,426fold
434,435fold
437,439fold
433,440fold
447,451fold
446,452fold
431,453fold
456,457fold
421,460fold
463,467fold
403,474fold
487,488fold
481,488fold
480,489fold
477,490fold
493,495fold
183,498fold
let &fdl = &fdl
15
normal! zo
44
normal! zo
45
normal! zo
65
normal! zo
183
normal! zo
202
normal! zo
217
normal! zo
248
normal! zo
267
normal! zo
let s:l = 174 - ((30 * winheight(0) + 37) / 75)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 174
normal! 017|
wincmd w
argglobal
if bufexists(fnamemodify("styles/base/_reset.scss", ":p")) | buffer styles/base/_reset.scss | else | edit styles/base/_reset.scss | endif
if &buftype ==# 'terminal'
  silent file styles/base/_reset.scss
endif
balt styles/utils/_button.scss
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
5,10fold
23,24fold
27,28fold
13,29fold
42,43fold
32,44fold
50,57fold
60,62fold
65,68fold
let &fdl = &fdl
let s:l = 40 - ((34 * winheight(0) + 29) / 58)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 40
normal! 03|
wincmd w
argglobal
if bufexists(fnamemodify("styles/base/_variables.scss", ":p")) | buffer styles/base/_variables.scss | else | edit styles/base/_variables.scss | endif
if &buftype ==# 'terminal'
  silent file styles/base/_variables.scss
endif
balt styles/base/_reset.scss
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let &fdl = &fdl
let s:l = 13 - ((12 * winheight(0) + 7) / 15)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 13
normal! 040|
wincmd w
exe 'vert 1resize ' . ((&columns * 141 + 141) / 283)
exe '2resize ' . ((&lines * 59 + 39) / 78)
exe 'vert 2resize ' . ((&columns * 141 + 141) / 283)
exe '3resize ' . ((&lines * 16 + 39) / 78)
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

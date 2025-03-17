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
badd +211 index.php
badd +77 api/users.php
badd +1 scripts/modules/table.js
badd +84 scripts/modules/api.js
badd +78 ~/code/activity-php/midterm_oop/scripts/modules/popup.js
badd +1 styles/components/_popup.scss
badd +13 styles/base/_variables.scss
badd +1 styles/utils/_button.scss
badd +55 styles/components/_table.scss
argglobal
%argdel
edit ~/code/activity-php/midterm_oop/scripts/modules/popup.js
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
exe 'vert 1resize ' . ((&columns * 96 + 96) / 193)
exe '2resize ' . ((&lines * 16 + 27) / 54)
exe 'vert 2resize ' . ((&columns * 96 + 96) / 193)
exe '3resize ' . ((&lines * 35 + 27) / 54)
exe 'vert 3resize ' . ((&columns * 96 + 96) / 193)
argglobal
balt scripts/modules/api.js
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
11,12fold
10,13fold
10,14fold
19,20fold
18,21fold
18,22fold
28,31fold
34,39fold
34,40fold
24,40fold
50,53fold
50,54fold
56,57fold
56,58fold
43,58fold
72,75fold
72,76fold
61,76fold
84,85fold
84,86fold
79,86fold
let &fdl = &fdl
let s:l = 63 - ((26 * winheight(0) + 25) / 51)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 63
normal! 0
wincmd w
argglobal
if bufexists(fnamemodify("styles/base/_variables.scss", ":p")) | buffer styles/base/_variables.scss | else | edit styles/base/_variables.scss | endif
if &buftype ==# 'terminal'
  silent file styles/base/_variables.scss
endif
balt styles/components/_popup.scss
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
let s:l = 7 - ((6 * winheight(0) + 7) / 15)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 7
normal! 024|
wincmd w
argglobal
if bufexists(fnamemodify("styles/components/_table.scss", ":p")) | buffer styles/components/_table.scss | else | edit styles/components/_table.scss | endif
if &buftype ==# 'terminal'
  silent file styles/components/_table.scss
endif
balt scripts/modules/table.js
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
18,21fold
24,31fold
34,42fold
55,56fold
51,57fold
70,71fold
65,72fold
75,76fold
60,77fold
45,78fold
82,85fold
88,92fold
95,96fold
99,103fold
let &fdl = &fdl
let s:l = 58 - ((21 * winheight(0) + 17) / 34)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 58
normal! 03|
wincmd w
exe 'vert 1resize ' . ((&columns * 96 + 96) / 193)
exe '2resize ' . ((&lines * 16 + 27) / 54)
exe 'vert 2resize ' . ((&columns * 96 + 96) / 193)
exe '3resize ' . ((&lines * 35 + 27) / 54)
exe 'vert 3resize ' . ((&columns * 96 + 96) / 193)
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

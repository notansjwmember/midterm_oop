let SessionLoad = 1
let s:so_save = &g:so | let s:siso_save = &g:siso | setg so=0 siso=0 | setl so=-1 siso=-1
let v:this_session=expand("<sfile>:p")
silent only
silent tabonly
cd ~/code/midterm_oop
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
badd +1 styles/components/_popup.scss
badd +7 styles/base/_variables.scss
badd +1 styles/utils/_button.scss
badd +66 styles/components/_table.scss
badd +8 scripts/modules/popup.js
argglobal
%argdel
edit styles/components/_table.scss
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
exe 'vert 1resize ' . ((&columns * 125 + 126) / 253)
exe '2resize ' . ((&lines * 21 + 34) / 69)
exe 'vert 2resize ' . ((&columns * 127 + 126) / 253)
exe '3resize ' . ((&lines * 45 + 34) / 69)
exe 'vert 3resize ' . ((&columns * 127 + 126) / 253)
argglobal
balt scripts/modules/popup.js
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
let s:l = 66 - ((65 * winheight(0) + 33) / 66)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 66
normal! 04|
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
let s:l = 7 - ((6 * winheight(0) + 10) / 20)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 7
let s:c = 24 - ((6 * winwidth(0) + 63) / 127)
if s:c > 0
  exe 'normal! ' . s:c . '|zs' . 24 . '|'
else
  normal! 024|
endif
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
68,72fold
75,76fold
60,77fold
45,78fold
82,85fold
88,92fold
95,96fold
99,103fold
let &fdl = &fdl
let s:l = 58 - ((27 * winheight(0) + 22) / 44)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 58
normal! 03|
wincmd w
exe 'vert 1resize ' . ((&columns * 125 + 126) / 253)
exe '2resize ' . ((&lines * 21 + 34) / 69)
exe 'vert 2resize ' . ((&columns * 127 + 126) / 253)
exe '3resize ' . ((&lines * 45 + 34) / 69)
exe 'vert 3resize ' . ((&columns * 127 + 126) / 253)
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

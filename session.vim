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
badd +168 index.php
badd +18 scripts/modules/popup.js
badd +104 scripts/modules/form.js
badd +37 styles/components/_form.scss
argglobal
%argdel
edit scripts/modules/popup.js
let s:save_splitbelow = &splitbelow
let s:save_splitright = &splitright
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
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
exe 'vert 1resize ' . ((&columns * 116 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 121 + 119) / 238)
argglobal
balt scripts/modules/form.js
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
2,5fold
7,10fold
1,12fold
22,25fold
22,26fold
14,26fold
34,35fold
34,36fold
29,36fold
let &fdl = &fdl
let s:l = 21 - ((17 * winheight(0) + 31) / 63)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 21
normal! 0
wincmd w
argglobal
if bufexists(fnamemodify("styles/components/_form.scss", ":p")) | buffer styles/components/_form.scss | else | edit styles/components/_form.scss | endif
if &buftype ==# 'terminal'
  silent file styles/components/_form.scss
endif
balt scripts/modules/form.js
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
3,7fold
10,12fold
21,22fold
25,29fold
15,30fold
40,43fold
51,52fold
46,53fold
33,54fold
85,87fold
90,91fold
94,95fold
72,96fold
99,100fold
63,101fold
104,107fold
116,117fold
111,118fold
57,119fold
133,135fold
138,141fold
145,146fold
144,147fold
122,148fold
151,155fold
let &fdl = &fdl
let s:l = 37 - ((36 * winheight(0) + 31) / 63)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 37
normal! 017|
wincmd w
exe 'vert 1resize ' . ((&columns * 116 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 121 + 119) / 238)
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

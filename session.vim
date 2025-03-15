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
badd +147 styles/global.css
badd +3 ~/code/activity-php/midterm_oop/index.php
badd +75 health://
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
exe 'vert 2resize ' . ((&columns * 141 + 141) / 283)
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
29,34fold
37,38fold
36,39fold
28,40fold
47,52fold
46,53fold
55,57fold
45,58fold
65,67fold
63,68fold
70,72fold
74,76fold
78,80fold
82,84fold
86,88fold
90,92fold
61,93fold
96,99fold
101,103fold
105,107fold
109,111fold
118,122fold
117,123fold
125,126fold
115,127fold
113,128fold
95,129fold
132,133fold
135,136fold
131,137fold
44,138fold
43,139fold
15,140fold
157,158fold
156,159fold
162,163fold
172,175fold
166,176fold
183,185fold
179,186fold
190,193fold
196,197fold
189,198fold
213,214fold
224,228fold
217,229fold
230,234fold
235,237fold
203,238fold
248,253fold
242,255fold
145,256fold
let &fdl = &fdl
let s:l = 3 - ((2 * winheight(0) + 38) / 76)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 3
normal! 0
wincmd w
argglobal
if bufexists(fnamemodify("styles/global.css", ":p")) | buffer styles/global.css | else | edit styles/global.css | endif
if &buftype ==# 'terminal'
  silent file styles/global.css
endif
balt ~/code/activity-php/midterm_oop/index.php
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
8,11fold
14,17fold
20,22fold
25,27fold
30,35fold
38,47fold
50,56fold
58,59fold
65,72fold
75,77fold
80,83fold
86,89fold
92,93fold
96,105fold
107,109fold
111,114fold
116,117fold
120,125fold
128,142fold
145,155fold
158,161fold
165,167fold
170,178fold
181,185fold
189,191fold
194,199fold
202,203fold
206,207fold
210,212fold
215,218fold
221,224fold
227,231fold
233,234fold
237,240fold
243,246fold
let &fdl = &fdl
let s:l = 1 - ((0 * winheight(0) + 38) / 76)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 1
normal! 015|
wincmd w
exe 'vert 1resize ' . ((&columns * 141 + 141) / 283)
exe 'vert 2resize ' . ((&columns * 141 + 141) / 283)
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

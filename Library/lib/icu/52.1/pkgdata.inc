GENCCODE_ASSEMBLY_TYPE=-a gcc-darwin
SO=dylib
SOBJ=dylib
A=a
LIBPREFIX=lib
LIB_EXT_ORDER=.52.1.dylib
COMPILE=cc -DU_ATTRIBUTE_DEPRECATED=   -DU_HAVE_ATOMIC=0  -arch x86_64 -no-cpp-precomp -O2 -std=c99 -Wall -pedantic -Wshadow -Wpointer-arith -Wmissing-prototypes -Wwrite-strings   -fno-common -c
LIBFLAGS=-I/Applications/MAMP/Library/include  -dynamic
GENLIB=cc -dynamiclib -dynamic -arch x86_64 -no-cpp-precomp -O2 -std=c99 -Wall -pedantic -Wshadow -Wpointer-arith -Wmissing-prototypes -Wwrite-strings   -arch x86_64 -Wl,-rpath,/Applications/MAMP/Library/lib 
LDICUDTFLAGS=
LD_SONAME=-Wl,-compatibility_version -Wl,52 -Wl,-current_version -Wl,52.1 -install_name /Applications/MAMP/Library/lib/
RPATH_FLAGS=
BIR_LDFLAGS=
AR=ar
ARFLAGS=r -c
RANLIB=ranlib
INSTALL_CMD=/usr/bin/install -c

#include<stdio.h>
#include<unistd.h>
#include<stdlib.h>
#include<math.h>
#include<string.h>
#include<sys/stat.h>
#include<fcntl.h>
#include<time.h>

#define MIN(a,b) (((a)<(b))?(a):(b))
#define MAX(a,b) (((a)>(b))?(a):(b))
#define sign(a) (((a)>(b))?(a):(b))

void delay(unsigned int mseconds)
{
    clock_t goal = mseconds + clock();
    while (goal > clock());
}

int main(int argc, char *argv[])
{
    char str[200];
    int sim_fd;
    int x, y, key,a,b,p,q,i,sp,sq, br;
    char buffer[10];
    FILE *fp; 
    fp = fopen("../storage/app/xy.txt", "r+");
	x = 0;
	y = 0;
	const int sensitivity = 1;
    
    // Open the sysfs coordinate node
    sim_fd = open("/sys/devices/platform/virmouse/vmevent", O_RDWR);
    if (sim_fd < 0) {
        perror("Couldn't open vms coordinate file\n");
        exit(-1);
    }
    
    while (1) {
    
     
        fscanf(fp, "%d %d %d %d",&x,&y,&key,&br);
        
       
        a = MAX(abs(x),abs(y));
        b = MIN(abs(x),abs(y));
        p = 0;
        q = 0;
        sp = 0;
        sq = 0;
        if(x!=0)
         {sp = x/abs(x);}
        if(y!=0)
         {sq = y/abs(y);}
         
        for(i=0;i<=a;i++)
        {
          if(abs(x) == a)
          {
             p = i*sp;
             q = 0;
             if(a != 0)
               { q = (i*b)/a*sq; } 
          }
          
          else if(abs(y) == a) 
          {
            p = 0;
            if(a!=0)
             {p = (i*b)/a*sp;}
             q = i*sq;
          }
          
          printf("%d %d %d %d\n",p,q,key,br);
       
          delay(3500);  
        // Convey simulated coordinates to the virtual mouse driver
        
	    p *= -sensitivity;
	    q *= sensitivity;


        
        if(key!=0)
        {
            rewind(fp);
            fprintf(fp, "%d %d %d %d",0,0,0,br);
        }

	    sprintf(buffer, "%d %d %d %d",p,q,key,br);
	    write(sim_fd, buffer, strlen(buffer));
	    fsync(sim_fd);
	    
	    
        
        
        }
        rewind(fp);  
         
	  
    }
    
    close(sim_fd);
}

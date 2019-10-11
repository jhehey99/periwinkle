
graphs_dir = "../files/graphs/"

filename = "Behavior_raml_6-13-2019_141315.pbg"

file = graphs_dir + filename

# print(file)

max_vol = 5;
max_val = 1024
threshold = int(1024*0.25)

highest_peak, lowest_peak, average_peak = 0, 0, 0
longest_interval, shortest_interval, average_interval = 0, 0, 0

with open(file) as f:
    lines = f.readlines()
    if(len(lines)) <= 0:
        exit()

    lines = [line.rstrip('\n').split(',') for line in lines]
    lines = [[t, int(v)] for t, v in lines]
    # print(lines)

    thresholded_lines = [[t, v / max_val * max_vol] for t, v in lines if v >= threshold]
    # print("thresholded_lines")
    # print(thresholded_lines)
    times = [t.split(':') for t,v in thresholded_lines]
    # print(times)

    seconds = []
    for time in times:
        l = len(time)
        if l == 2:
            seconds.append(float(time[0]) * 60 + float(time[1])) # min secs lng
        elif l == 3:
            seconds.append(float(time[0]) * 60 + float(time[1]) * 60 + float(time[2])) # kasama ung hour

    # print("seconds")
    # print(seconds)

    voltages = [v for t,v in thresholded_lines]
    # print("voltages")
    # print(voltages)

    highest_peak = round(max(voltages), 4)
    # print(highest_peak)

    lowest_peak = round(min(voltages), 4)
    # print(lowest_peak)


    average_peak = round(sum(voltages) / len(voltages), 4)
    # print(average_peak)


    # in seconds
    intervals = []
    for i in range(len(seconds) - 1):
        intervals.append(round(abs(seconds[i + 1] - seconds[i]), 4))

    # print("intervals")
    # print(intervals)
    longest_interval = max(intervals)
    # print(longest_interval)

    shortest_interval = min(intervals, key=lambda x: x if x > 0 else max_val)
    # print(shortest_interval)

    average_interval = round(sum(intervals) / len(intervals), 4)
    # print(average_interval)

    print("{}:{}:{}:{}:{}:{}".format(highest_peak, lowest_peak, average_peak, longest_interval, shortest_interval, average_interval))

    # for line in lines:
    #     time, voltage = line




